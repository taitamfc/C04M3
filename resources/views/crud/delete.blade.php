<form action="/destroy" method="post">
    @csrf
    @method('DELETE');
    <input type="submit" value="Send">
</form>