<!-- in resources/views/comments.blade.php -->

<div id="comments">
    <!-- The comments will be inserted here via AJAX -->
</div>

<form id="comment-form">
    <textarea name="body"></textarea>
    <button type="submit">Submit</button>
</form>

<script setup>
$(document).ready(function() {
    // Load comments
    $.get('/comments', function(data) {
        data.forEach(function(comment) {
            $('#comments').append('<p>' + comment.content + '</p>');
        });
    });

    // Submit form
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();
        $.post('/comments', $(this).serialize(), function(comment) {
            $('#comments').append('<p>' + comment.content + '</p>');
        });
    });
});
<script>