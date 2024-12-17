@extends('layout')

@section('content')
    <h3>Backoffice</h3>

    <a class="btn btn-danger" href="/user/signOut" onclick="return confirm('Are you sure you want to sign out?')">
        <i class="fa fa-sign-out"></i>
        Sign Out
    </a>
    <a class="btn btn-primary" href="/user/info">
        <i class="fa fa-user"></i>
        User Info
    </a>
@endsection
