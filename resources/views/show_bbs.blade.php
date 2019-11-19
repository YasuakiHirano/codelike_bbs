@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            {{ $board->title }}
        </div>
        <div class="card-body">
            <div>{{ $board->user_name }}</div>
            <div class="rounded border p-2 mt-2">
                {!! nl2br($board->about_text) !!}
            </div>
            <div class="mt-3 mb-3 row justify-content-end">
                <div class="btn btn-danger">
                    削除
                </div>
            </div>
        </div>
    </div>
    @foreach($messages as $message)
        <div class="card mt-3">
            <div class="card-body">
                <div>{{ $message->user_name }}</div>
                <div class="rounded border p-2 mt-2">
                    {!! nl2br($message->message) !!}
                </div>
            </div>
        </div>
    @endforeach
    <div class="fixed-bottom">
        <form method="post" action="{{ route("detail.response") }}">
            @csrf
            <input type="hidden" name="board_id" value="{{ $board->id }}"/>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-inline">
                        <label class="col-form-label">名前</label>
                        <input type="text" name="user_name" class="form-control ml-2 col-5"/>
                    </div>
                    <div class="form-inline mt-2">
                        <label class="col-form-label">内容</label>
                        <textarea name="message" class="form-control ml-2 col-10"></textarea>
                    </div>
                    <div class="justify-content-center mt-2">
                        <button type="submit" class="btn btn-primary mx-auto d-block col-3">投稿</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection