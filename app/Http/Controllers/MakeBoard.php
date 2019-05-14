<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class MakeBoard extends Controller
{
    public function index()
    {
        return view("post_bbs");
    }

    public function save(Request $request)
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
