@extends('layouts.app')

@section('title')
    Edit post | @parent
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-body p-0">

                    <form method="post" action="{{ route('posts.update', $post) }}">
                        @csrf
                        @method('PUT')
                        <input class="form-control border-0 shadow-none pt-3{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $errors->has('title') ? old('title') : $post->title }}" placeholder="title" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                        <hr>

                        <textarea class="form-control border-0 shadow-none pb-3 pt-0{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" placeholder="post" rows="5" required>{{ $errors->has('body') ? old('body') : $post->body }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif

                        <button type="submit" class="text-dark btn btn-block btn-primary rounded-0">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
