@extends('layouts.master')

@section('body')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right welcome-links">
            @auth
                <a href="{{ url('/home') }}">dashboard</a>
            @else
                <a href="{{ route('login') }}">login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="welcome-content">
        <div class="brand display-1">blumblr</div>

        <div class="welcome-new">
            <p><a href="#posts">see what's new</a></p>
            <a href="#posts"><i class="fas fa-arrow-down"></i></a>
        </div>
    </div>
</div>

<a name="posts"></a>
<div class="pt-5">
    @foreach ($posts as $post)
        <post-card
            post-url="{{ route('posts.show', $post) }}"
            user="{{ $post->user->name }}"
            updated-at-string="{{ $post->updated_at }}"
        >
            <template slot="title">{{ $post->title }}</template>
            <template slot="body">{{ $post->body }}</template>
        </post-card>
    @endforeach
</div>
@endsection
