@extends('layout')

@section('content')
    <h1>User List</h1>

    <a href="/users/form" class="btn btn-primary">
        <i class="fa-solid fa-plus me-2"></i>
        Add User
    </a>

    @if (isset($users))
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="/users/form/{{ $user->id }}" class="btn btn-primary">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
