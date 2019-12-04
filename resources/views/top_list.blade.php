@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-3 row justify-content-end">
        <a href="{{ route('board.index') }}" class="btn btn-primary mr-3">新規登録</a>
    </div>
    <div class="mt-1 mb-1 row justify-content-center">
        {{ $board_list->links() }}
    </div>
    <ul class="list-group">
        @if($board_list->count() != 0)
            @foreach ($board_list as $board)
                <li class="list-group-item">
                    <div class=" d-flex justify-content-between">
                        <a href="{{ route('detail.index', ["id" => $board->id]) }}"><h4>{{ $board->title }}</h4></a>
                        <small class="text-secondary">{{ date_format($board->created_at, 'Y/m/d') }}</small>
                    </div>
                    @if(strlen($board->about_text) <= 100)
                        <p class="mb-1">{{ $board->about_text }}</p>
                    @else
                        <p class="mb-1">{{ substr($board->about_text,0,100) }}...</p>
                    @endif
                    <small class="text-secondary">投稿者：{{ $board->user_name }}</small>
                </li>
            @endforeach
        @else
            <li class="list-group-item">
                投稿がありません。
            </li>
        @endif
    </ul>
@endsection
