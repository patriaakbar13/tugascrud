@extends('app')

@section('title', 'Homepage')

@section('content')
    <h1>Edit Profile</h1>
    <div class="row">
        <div class="col-2">
            @if($user->avatar)
                <img src="{{ asset('storage/'.$user->avatar) }}" class="img-fluid">
            @else
                <img src="https://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" class="img-fluid">
            @endif
        </div>
        <div class="col">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" disabled id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    @error('name')
                        <div id="nameHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                    @error('avatar')
                        <div id="avatarHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection