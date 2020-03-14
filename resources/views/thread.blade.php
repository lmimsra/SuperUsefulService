@extends('layouts.app')

@section('content')
    {{-- 新規投稿 --}}
    <form method="post" action="/threads">
        {{ csrf_field() }}
        <p>
            新規スレ：<input type="text" name="title" value=""/>
            <input type="submit" value="作成"/>
        </p>

    </form>

    <h1>スレッド一覧</h1>
    @foreach ($threads as $thread)
        <div>
            <a href="{{ url('threads/'.$thread->id) }}">
                {{ $thread->title }}
                ({{ count($thread->post_list) }})
                {{ $thread->updated_at->format('Y/m/d H:i:s') }}
            </a>
        </div>
    @endforeach
@endsection
