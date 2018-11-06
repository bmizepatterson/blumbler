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
                    <a href="{{ route('register') }}">legister</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="welcome-content">
        <div class="brand display-1">blumblr</div>

        <div class="welcome-new">
            <p>see what's new</p>
            <p class="mb-0"><i class="fas fa-arrow-down"></i></p>
        </div>
    </div>
@endsection
