@auth
    <form method = "post" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="event_id" value="{{ $event}}">
        <div class="form-group">
            <label for="content">Comment:</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endauth
