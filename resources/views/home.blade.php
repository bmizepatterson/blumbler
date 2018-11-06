@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header"><h4 class="m-0">Create a new post</h4></div>

                <div class="card-body">

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}"required autofocus>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="body">Post:</label>
                            <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" required>{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <button type="submit" class="brand text-dark btn btn-block btn-primary">blumblit!</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->posts()->count())
        @foreach (Auth::user()->posts as $post)
            <post-card
                updated-at-string="{{ $post->updated_at }}"
                edit-url="{{ route('posts.edit', $post) }}"
                delete-url="{{ route('posts.destroy', $post) }}"
            >
                <template slot="title">{{ $post->title }}</template>
                <template slot="body">{{ $post->body }}</template>
                <template slot="deleteformfields">@csrf @method('DELETE')</template>
            </post-card>
        @endforeach
    @endif
</div>
@endsection
