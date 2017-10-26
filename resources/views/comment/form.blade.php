<form method="POST" action="/messages/{{ $message->id }}/comments">
    {{ csrf_field() }}

    @if (isset($parentId))
        <input name="parent_id" type="hidden" value="{{ $parentId }}"></input>
    @endif

    <textarea name="body" required></textarea><br>

    <button type="submit">Reply</button>
</form>
