@extends('layouts.app')
@section('content')
<div class="profile-container">
    <form action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            {{-- <label for="username"></label> --}}
        <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{ old('username') ?? $user->profile->username }}">
        </div>
        <div class="form-group">
            {{-- <label for="bio"></label> --}}
            <input name="bio" type="text" class="form-control" id="bio" placeholder="bio" value="{{ old('bio') ?? $user->profile->bio }}">
        </div>
        <div class="form-group">
            {{-- <label for="image"></label> --}}
            <input name="image" type="file" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
        <a href="{{ route('profiles.show', auth()->user()->id) }}" class="ml-2 btn btn-outline-secondary">Cancel</a>
    </form>
</div>
@endsection