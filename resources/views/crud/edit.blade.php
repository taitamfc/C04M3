<form action="/update" method="post">
    @csrf
    @method('PUT');
    <input type="email" name="email" id=""> <br>
    <input type="submit" value="Send">
</form>