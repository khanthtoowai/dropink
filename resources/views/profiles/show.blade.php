@extends('layouts.app')
@section('content')
<div class="profile-container">
    <div class="row mt-5">
        <div class="col-9">
            <div class="d-flex align-items-center">
                <div style="font-weight: 700; font-size: 1.5em">{{ $user->profile->username ?? $user->name }}</div>
                @can('update', $user->profile)
                <a href="{{ route('profiles.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary ml-5">Edit profile</a>  
                @endcan
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div class="mt-2">
                {{ $user->profile->bio }} 
            </div>
            <div class="mt-4 text-muted">{{ $user->following()->count() }} following</div>
        </div>
        <div class="col-3">
            <img src="{{ $user->profile->profileImage() ?? 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png' }}" class="rounded-circle" alt=""
                style="max-width: 135px">
        </div>
    </div>
    <hr class="mt-5">
    <div class="mt-4 mb-1" style="font-weight: bold; font-size: 1.2em">Latest</div>
    @foreach ($user->stories as $story)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex">
                    <img src="https://miro.medium.com/fit/c/256/256/2*zv7rCqH0DHWyBgTAy4P1Kw.jpeg"
                        class="rounded-circle" alt="" style="max-width: 50px">
                    <div class="ml-3">
                        <div>Bob</div>
                        <div class="text-muted">{{ $story->created_at }} &bull; 1min read</div>
                    </div>
                </div>
                <a href="{{ route('stories.show', $story->id) }}">
                    <img class="mt-4" src="{{ '/storage/' . $story->image }}" alt=""
                    style="width: 550px; height: 160px; object-fit: cover;">
                </a>
                <div class="mt-4" style="font-size: 1.5em; font-weight: 700">{{ $story->title }} </div>
                <div class="mt-3">{{ $story->body }} </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection