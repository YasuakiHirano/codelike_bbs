@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-3 row justify-content-end">
        <a href="{{ route('board.index') }}" class="btn btn-primary mr-3">新規登録</a>
    </div>
    <ul class="list-group">
        @if(isset($board_list))
            @foreach ($board_list as $board)
                <li class="list-group-item">
                    <div class=" d-flex justify-content-between">
                        <a href="{{ route('detail.index', ["id" => $board->id]) }}">{{ $board->title }}</a>
                        <small>{{ date_format($board->created_at, 'Y/m/d') }}</small>
                    </div>
                </li>
            @endforeach
        @else
            <li class="list-group-item">
                投稿がありません。
            </li>
        @endif
    </ul>
@endsection
