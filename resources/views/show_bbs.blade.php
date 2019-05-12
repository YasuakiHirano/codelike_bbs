@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div>山田太郎</div>
            <div class="rounded border p-2 mt-2">
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
            </div>
            <div class="mt-3 mb-3 row justify-content-end">
                <div class="btn btn-danger">
                    削除
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div>佐藤次郎</div>
            <div class="rounded border p-2 mt-2">
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
                内容～～～～～～～～～～～～～～～～<br/>
            </div>
        </div>
    </div>
    <div class="fixed-bottom">
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-inline">
                    <label class="col-form-label">名前</label>
                    <input type="text" name="user_name" class="form-control ml-2 col-5"/>
                </div>
                <div class="form-inline mt-2">
                    <label class="col-form-label">内容</label>
                    <textarea name="post_text" class="form-control ml-2 col-10"></textarea>
                </div>
                <div class="justify-content-center mt-2">
                    <button type="button" class="btn btn-primary mx-auto d-block col-3">投稿</button>
                </div>
            </div>
        </div>
    </div>
@endsection