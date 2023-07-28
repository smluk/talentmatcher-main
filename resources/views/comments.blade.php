@section('aside')
    @parent

<div cstyle="overflow: scroll ;max-height: 250px; width: 50%;">
<table class = "table table-sm" id="assign_table">
    <thead>
        <tr>
            <th>Comments</th>
        </tr>
    </thead>
   <!-- The comments will be inserted here via AJAX -->
    <tbody id = "comments">
    </tbody>
</table>

<form id="comment-form">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <input type="hidden" name="event_id" value="{{ $event->id}}">
    <textarea name="body"></textarea>
    <button type="submit">Submit</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>  
$(document).ready(function() {
    // Define a fetch comment function for reuse
    function fetchComments(comment){
                var date = new Date(comment.created_at);
                date = Intl.DateTimeFormat('en-US').format(date);
                $('#comments').append('<tr><td>' + comment.body + ' ('+ comment.user_id + ' on ' + date + ')</td></tr>');
            }
    
            
    function loadAllComments(event_id) {
        $.get('/comments/' , {event_id: event_id},
            function(data) {
                data.forEach(function(comment) {
                    fetchComments(comment);
                });
            }
        );
    }

    // Load comments on page load
    var event_id = {{ $event->id }};
    loadAllComments(event_id);

    // Submit form
    $('#comment-form').on('submit', function(e) {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
        e.preventDefault();
        $.post('/comments', $(this).serialize())         
    });
/*
    setInterval(function(){
        $('#comments').empty();
        loadAllComments(event_id);
    }, 5000) /* time in milliseconds (ie 2 seconds)*/
});
</script>
@endsection