@section('aside')

<div class="comments">
    <h3>Comments</h3>
    <ul id="comment-list">
        <!-- Display comments here -->
    </ul>
    <div class="new-comment-box">
        <h4>Add a comment</h4>
        <form id="add-comment-form">
        <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="event_id" value="{{ $event->id }}" />
            <div class="form-group">
                <label for="comment-text">Comment:</label>
                <textarea class="form-control" id="comment-text" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>

$(document).ready(function() {
    // Retrieve comments on page load
    getComments();

    // Submit new comment on form submit
    $('#add-comment-form').on('submit', function(event) {
         $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
        event.preventDefault();
        $.ajax({
            url: '/comments/add',
            type: 'POST',
            dataType: 'json',
            data: $('#add-comment-form').serialize(),

            success: function(response) {
                // Clear form fields
                $('#comment-text').val('');
                // Add new comment to list
                var html = '<li><p>' + response.body + '</p><small>Posted on ' + response.created_at + '</small></li>';
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
                html += '<li><p>' + comment.body + '</p><small>Posted on ' + date + '</small></li>';
            });
            $('#comment-list').html(html);
        }
            
    });
}


</script>
@endsection