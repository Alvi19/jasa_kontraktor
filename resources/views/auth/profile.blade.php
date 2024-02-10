@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:start" class="text-primary mb-4"><strong>Profile</strong></h1>
                    <hr class="py-2 mb-1 my-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" class="form-control summernote" type="text" name="username" placeholder="Username" value="{{ old('username') ?? @$user->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" class="form-control summernote" type="password" name="password" placeholder="Password">
                        </div>
                        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection