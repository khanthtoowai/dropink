@extends('layouts.app')
@section('content')
    <div class="profile-container">
        <form action="{{ route('stories.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="form-group row">
            <div class="col-12 mt-3 p-0">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" placeholder="Title">

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12 mt-4 p-0">
                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="{{ old('body') }}" rows="4" placeholder="Tell your story..."></textarea>

                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12 mt-3 p-0">
                <label for="image">Add story image</label>
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-success mt-3">Submit</button>
            <a href="#" class="ml-2 btn btn-outline-secondary mt-3">Cancel</a>
        </div>
    </form>

    </div>
@endsection