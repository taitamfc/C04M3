<form action="{{ route('luu-moi') }}" method="post">
    @csrf
    <input type="email" name="email" id=""> <br>
    <input type="submit" value="Send">
</form>