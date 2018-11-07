@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-body p-0">

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <input v-focus class="form-control border-0 shadow-none pt-3{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" placeholder="title" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                        <hr>

                        <textarea class="form-control border-0 shadow-none pb-3 pt-0{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" placeholder="post" rows="5" required>{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif

                        <button type="submit" class="brand text-dark btn btn-block btn-primary rounded-0 shadow-none">blumblit!</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->posts()->count())
        @foreach (Auth::user()->posts as $post)
            <post-card
                updated-at-string="{{ $post->updated_at }}"
                post-url="{{ route('posts.show', $post) }}"
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
