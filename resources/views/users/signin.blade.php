@extends('layout')

@section('content')
    <div class="container">
        <h3>Sign In</h3>

        @if (isset($errors))
            @foreach ($errors as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form action="/user/signInProcess" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">

                @if (isset($errors))
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">

                @if (isset($errors))
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>
@endsection

