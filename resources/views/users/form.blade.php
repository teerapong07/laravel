@extends('layout')

@section('content')
    <h1>User Form</h1>
    <form
    @if (isset($id))
        action="/users/{{ $id }}"
    @else
        action="/users"
    @endif

    method="POST"
    >

    @csrf
    @if (isset($id))
        @method('PUT')
    @endif

    <div>Name</div>
    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $name }}" placeholder="Name">
    @if ($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
    @endif
    
    <div class="mt-3">Email</div>
    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $email }}" placeholder="Email">
    @if ($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
    @endif

    <div class="mt-3">Password</div>
    <div class="input-group">
        <input type="password" class="form-control" name="password" value="{{ old('password') ?? $password }}" placeholder="Password" id="password">
        <button class="btn btn-secondary" style="widtfh: 50px;" type="button" onclick="togglePassword()">
            <i class="fa-solid fa-eye" id="toggleIcon"></i>
        </button>
    </div>
    @if ($errors->has('password'))
        <div class="text-danger">{{ $errors->first('password') }}</div>
    @endif
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-check me-2"></i>
            Save
        </button>
    </div>
    </form>
@endsection

