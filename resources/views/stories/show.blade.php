@extends('layouts.app')
@section('content')
<div class="profile-container">
    <div class="mt-4" style="font-size: 1.5em; font-weight: 700">{{ $story->title }} </div>

    <div class="d-flex mt-4">
        <img src="https://miro.medium.com/fit/c/256/256/2*zv7rCqH0DHWyBgTAy4P1Kw.jpeg"
            class="rounded-circle" alt="" style="max-width: 50px">
        <div class="ml-3">
            <div class="d-flex align-items-center">
                <div class="mr-5">Bob</div>
                <follow-button user-id="{{ $story->user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div class="text-muted">{{ $story->created_at }} &bull; 1min read</div>
        </div>
    </div>

    <div class="mt-5">{{ $story->body }}</div>

    
    <img class="mt-4" src="{{ '/storage/' . $story->image}}" alt="" style="width: 550px;">

    <hr class="mt-5">

    <div class="d-flex mt-5">
        <img src="https://miro.medium.com/fit/c/256/256/2*zv7rCqH0DHWyBgTAy4P1Kw.jpeg"
            class="rounded-circle" alt="" style="max-width: 100px">
            <div class="ml-3">
            <div class="d-flex align-items-center">
                <div class="mr-5 text-muted">WRITTEN BY</div>
                <follow-button user-id="{{ $story->user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            <div style="font-size: 30px">{{ $story->user->profile->username }}</div>
        </div>
    </div>
</div>
@endsection