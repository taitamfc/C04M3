@extends('layouts.admin.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Book</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Book
        </div>
        <div class="card-body">
             
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('books.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group mb-3">
                    <label>Add 1</label>
                    <input class="form-control" type="text" name="add_1">
                </div>
                <div class="form-group mb-3">
                    <label>Add 2</label>
                    <input class="form-control" type="text" name="add_2">
                </div>
                <div class="form-group mb-3">
                    <label>Type</label>
                    <select name="type_id" class="form-control">
                        <option value="">Please select</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection