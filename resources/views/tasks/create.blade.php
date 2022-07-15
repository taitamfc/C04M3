@extends('layouts.admin.master')
@section('content')
<h1 class="mt-4">Hello {{ $admin_name }}</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group">
                <label for="my-input">Name</label>
                <input id="my-input" class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" type="text" name="email">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection