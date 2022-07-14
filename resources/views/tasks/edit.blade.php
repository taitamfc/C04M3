<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="container">
    <form method="post" action="{{ route('tasks.update',['id' => 0]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="my-input">Name</label>
            <input id="my-input" class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="my-input">Email</label>
            <input id="my-input" class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="button">Submit</button>
        </div>
    </form>
</div>
