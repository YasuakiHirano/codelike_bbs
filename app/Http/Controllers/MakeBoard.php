<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardCreateRequest;
use App\Http\UseCase\MakeBoard\CreateMakeBoardCase;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MakeBoard extends Controller
{
    /**
     * 初期表示
     * @return Factory|View
     */
    public function index()
    {
        return view("post_bbs");
    }

    /**
     * 新規掲示板保存
     * @param BoardCreateRequest $request
     * @param CreateMakeBoardCase $case
     * @return RedirectResponse
     */
    public function save(BoardCreateRequest $request, CreateMakeBoardCase $case)
    {
        $case($request->board_title, $request->user_name, $request->about_text, $request->password);
        return redirect()->route("top.index");
    }
}
