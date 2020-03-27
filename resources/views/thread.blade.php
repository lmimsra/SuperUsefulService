@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- 新規投稿 --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規スレ</div>

                    <div class="card-body">
                        <form method="POST" action="/threads">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="title" value=""
                                           placeholder="スレッドタイトル"/>

                                    {{--  エラーハンドリング追加したらなんかやるかもしれない  --}}
                                    {{-- @error('email')  --}}
                                    {{-- <span class="invalid-feedback" role="alert">  --}}
                                    {{--     <strong>{{ $message }}</strong>  --}}
                                    {{-- </span>  --}}
                                    {{-- @enderror  --}}
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">作成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <h1>スレッド一覧</h1>
            {{--  スレッドがあれば表示--}}
            @if(isset($threads))
                @foreach ($threads as $thread)
                    <div>
                        <a href="{{ url('threads/'.$thread->id) }}">
                            {{ $thread->title }}
                            ({{ count($thread->getPostList) }})
                            {{ $thread->updated_at->format('Y/m/d H:i:s') }}
                        </a>
                    </div>
                @endforeach
            @else
                <h2>まだスレッドはありません！</h2>
            @endif
        </div>
    </div>
@endsection
