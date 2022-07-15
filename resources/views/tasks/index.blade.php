@extends('layouts.admin.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-info"> Them moi </a>
            <table class="table table-dark">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                    </tr>
                    @if( count($items) )
                    @foreach( $items as $key => $item )
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <a href="{{ route('tasks.destroy',['id' => 1]) }}" class="btn btn-primary">Show</a>
                            <form method="post" action="{{ route('tasks.destroy',['id' => 1]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3"> Khong co du lieu </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection