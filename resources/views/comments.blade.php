<div class="comments">
    <h4>Comments</h4>
    <ul id="comment-list">
        <!-- Display comments here -->
    </ul>
    @if (Auth::check())
    <div class="new-comment-box">
        <form id="add-comment-form" name="add-comment-form">
            <div class="form-group">
                <label for="comment-text">Add a Comment:</label>
                <textarea class="form-control" id="body" name="body" rows="3" form = "add-comment-form" placeholder = "Input comment here"></textarea>
            </div>
                       <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" id="event_id" name="event_id" value="{{ $event->id }}" form = "add-comment-form" >
            <button type="submit" class="btn btn-primary" form = "add-comment-form" >Submit</button>
          </form>
    </div>
    @endif
</div>


<script>
$(document).ready(function() {
    // Retrieve comments on page load
    getComments();

    // Submit new comment on form submit
    $('#add-comment-form').on('submit', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url: '/comments/add',
            type: 'POST',
            dataType: 'json',
            data: $('#add-comment-form').serialize(),

            success: function(response) {
                // Clear form fields
                $('#body').val('');
                // Add new comment to list
                var date = new Date(response.created_at);
                date = Intl.DateTimeFormat('en-US').format(date);
                var html = '<li><small>' + date + '&emsp;&emsp;' + response.body + '</small></li>';
                $('#comment-list').prepend(html);
            }
            
        });
    });

    // Periodically update comments
    setInterval(function() {
        getComments();
    }, 50000);
});

function getComments() {
    $.ajax({
        url: '/comments/get/{{ $event->id }}',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var html = '';
            $.each(response, function(index, comment) {
                var date = new Date(comment.created_at);
                date = Intl.DateTimeFormat('en-US').format(date);
                html += '<li><small>' + date + '&emsp;&emsp;' + comment.body  + '</small></li>';
            });
            $('#comment-list').html(html);
        }
            
    });
}


</script>