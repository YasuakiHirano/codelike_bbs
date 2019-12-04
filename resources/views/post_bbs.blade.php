@extends('layouts.app')

@section('content')
    <form action="{{ route('board.save') }}" method="POST" id="make_board" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="board_title">タイトル</label>
            <input type="text" class="form-control" name="board_title" id="board_title" value="{{ old('board_title') }}" maxlength="140">
        </div>
        <div class="form-group">
            <label for="user_name" class="col-form-label">名前</label>
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" maxlength="140">
        </div>
        <div class="form-group">
            <label for="about_text">説明文</label>
            <textarea class="form-control" style="height:200px;" name="about_text" id="about_text"
                      maxlength="1024">{{ old('about_text') }}</textarea>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" name="password" id="password" maxlength="20">
        </div>
        <div class="justify-content-center">
            <button type="submit" class="btn btn-primary mx-auto d-block col-3">作成</button>
        </div>
    </form>
@endsection
