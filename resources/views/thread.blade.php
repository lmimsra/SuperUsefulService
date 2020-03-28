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
                                <div class="col-md-2">
                                    <label for="thread-title" class="col-form-label">タイトル</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="title" value="" id="thread-title"
                                           placeholder="新しいスレッドを作ろう！"/>

                                    {{--  エラーハンドリング追加したらなんかやるかもしれない  --}}
                                    {{-- @error('email')  --}}
                                    {{-- <span class="invalid-feedback" role="alert">  --}}
                                    {{--     <strong>{{ $message }}</strong>  --}}
                                    {{-- </span>  --}}
                                    {{-- @enderror  --}}
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">作成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 1rem">
            <h1>スレッド一覧</h1>
            {{--  スレッドがあれば表示--}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>スレッド名</td>
                    <td>コメント数</td>
                    <td>最終更新</td>
                </tr>
                </thead>
                @if(isset($threads))
                    <tbody>
                    @foreach ($threads as $thread)
                        <tr>
                            <td>{{$thread->id}}</td>
                            <td><a style="display: block; width: 100%; height: 100%;"
                                   href="{{ url('threads/'.$thread->id) }}">{{ $thread->title }}</a></td>
                            <td>{{ count($thread->getPostList) }}</td>
                            <td>{{ $thread->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <h2>まだスレッドはありません！</h2>
                @endif
            </table>
        </div>
    </div>
@endsection
