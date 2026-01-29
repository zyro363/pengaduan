@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">Login Admin</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.admin') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    @if($errors->has('login'))
                    <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                    @endif
                    <button class="btn btn-dark w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection