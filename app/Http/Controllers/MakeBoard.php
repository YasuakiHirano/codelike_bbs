<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardCreateRequest;
use App\Model\Board;
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
     * @return RedirectResponse
     */
    public function save(BoardCreateRequest $request)
    {
        /** @var Board $board */
        $board = new Board();
        $board->fill([
            'title' => $request->board_title,
            'user_name' => $request->user_name,
            'about_text' => $request->about_text,
            'password' => $request->password
        ])->save();

        return redirect()->route("top.index");
    }
}
