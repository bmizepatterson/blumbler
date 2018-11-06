@extends('layouts.app')

@section('title')
    {{ $post->title }} | @parent
@endsection

@section('content')
<div class="container">

    <post-card
        user="{{ $post->user->name }}"
        updated-at-string="{{ $post->updated_at }}"
    >
        <template slot="title">{{ $post->title }}</template>
        <template slot="body">{{ $post->body }}</template>
    </post-card>

</div>
@endsection
