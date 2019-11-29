@extends('layouts.app')

@section('content')
    <script>
        window.onload = function () {
            $(".message-box").hide();
            $(".message-open").show();
        };

        function closeMessageBox() {
            $(".message-box").hide("slow");
            $(".message-open").show("slow");
        }

        function openMessageBox() {
            $(".message-open").hide("slow");
            $(".message-box").show("slow");
        }

        $(function () {
            $("#btn-delete").on("click", function () {
                if ($("#password").val() === "") {
                    $("#password").show();
                } else {
                    if(confirm("削除しますか？")) {
                        $("#delete_password").val($("#password").val());
                        $("#delete_form").submit();
                    }
                }
            });
        });
    </script>
    <div class="card mt-3">
        <div class="card-header">
            {{ $board->title }}
        </div>
        <div class="card-body">
            <form action="{{ route("detail.delete") }}" method="post" id="delete_form">
                @csrf
                <input type="hidden" value="{{ $board->id }}" name="board_id"/>
                <input type="hidden" value="" name="delete_password" id="delete_password" />
                <div>{{ $board->user_name }}</div>
                <div class="rounded border p-2 mt-2">
                    {!! nl2br($board->about_text) !!}
                </div>
                <div class="mt-3 mb-3 row justify-content-end">
                    <input type="password" name="password" id="password" value="" class="form-control col-4 mr-2"
                           style="display:none;" placeholder="パスワード入力..." maxlength="30"/>
                    <button type="button" id="btn-delete" class="btn btn-danger mr-3">
                        削除
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="pb-5">
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
    </div>
    <div style="position:fixed; bottom:5px;right:5px;">
        <button class="message-open btn-lg btn-primary pl-5 pr-5" onclick="openMessageBox();">
            投稿する！
        </button>
    </div>
    <div class="fixed-bottom message-box">
        <form method="post" action="{{ route("detail.response") }}">
            @csrf
            <input type="hidden" name="board_id" value="{{ $board->id }}"/>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-inline">
                        <label class="col-form-label">名前</label>
                        <input type="text" name="user_name" class="form-control ml-2 col-5" placeholder="名前を入力..."/>
                    </div>
                    <div class="form-inline mt-2">
                        <label class="col-form-label">内容</label>
                        <textarea name="message" class="form-control ml-2 col-10" placeholder="コメントを入力..."></textarea>
                    </div>
                    <div class="justify-content-center mt-2">
                        <div class="row">
                            <button type="submit" class="btn btn-primary mx-auto d-block col-5">投稿</button>
                            <button type="button" class="btn btn-success mx-auto d-block col-5"
                                    onclick="closeMessageBox();">閉じる
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
