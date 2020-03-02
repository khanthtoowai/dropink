@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                @foreach ($stories as $story)
                <div class="d-flex align-items-start justify-content-between my-5">
                    <div>
                        <div class="text-muted">BASED ON PEOPLE YOU FOLLOWED</div>
                        <div class="h3 font-weight-bold">
                            <a href="{{ route('stories.show', $story->id) }}" class="text-reset">
                                {{ $story->title }}
                            </a>
                        </div>
                        <div class="text-muted">{{ Str::limit($story->body, 80) }}</div>
                        <div class="text-muted">{{ $story->user->name }}</div>
                        <div class="mt-2 text-muted">{{ $story->created_at }}</div>

                    </div>
                    <div>
                        <img src="{{ '/storage/' . $story->image }}" alt=""
                        style="width: 150px; height: 160px; object-fit: cover;">
                    </div>
                </div>
                    
                @endforeach
            </div>
            <div class="col-4">
                <div class="mt-5 font-weight-bolder">POPULAR ON DROPINK</div> 
                <hr>
            </div>
        </div>
    </div>
@endsection