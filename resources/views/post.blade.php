@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="/threads">スレッド一覧に戻る</a>
        <h1>{{$thread->title}}</h1>

        {{-- 新規投稿 --}}
        <form method="post" action="/posts">
            {{ csrf_field() }}
            <input type="hidden" name="thread_id" value="{{$thread->id}}"/>
            <p>
                名前：<label>
                    <input type="text" name="name" value=""/>
                </label>
                <input type="submit" value="投稿"/>
            </p>
            <p>
                内容：<textarea name="content" rows="4" cols="40"></textarea>
            </p>
        </form>

        {{-- 投稿一覧 --}}
        @if(isset($thread))
            @foreach ($thread->getPostList as $post)
                {{ $post->created_at->format('Y/m/d H:i:s') }}（{{ $post->name }}）
                <div>
                    {{-- HTMLタグ無効化してから、改行を<br>変換  --}}
                    {!! nl2br(htmlspecialchars($post->content)) !!}
                </div>
            @endforeach
        @else
            <h3>コメントはまだありません！</h3>
        @endif
    </div>
@endsection
