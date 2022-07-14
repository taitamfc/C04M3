<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="container">
    <a href="{{ route('tasks.create') }}" class="btn btn-info"> Them moi </a>
    <table class="table table-dark">
        <tbody>
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Nguyen Van A</td>
                <td>
                    <a href="{{ route('tasks.destroy',['id' => 1]) }}" class="btn btn-primary">Show</a>
                    <form method="post" action="{{ route('tasks.destroy',['id' => 1]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nguyen Van B</td>
                <td>
                    <a href="{{ route('tasks.destroy',['id' => 2]) }}" class="btn btn-primary">Show</a>
                    <form method="post" action="{{ route('tasks.destroy',['id' => 2]) }}">
                        @csrf
                        @method('DELETE')
                        <button
                        onclick=" return confirm('Are you sure ?'); "
                        class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>