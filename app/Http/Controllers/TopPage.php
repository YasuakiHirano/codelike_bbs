<?php

namespace App\Http\Controllers;

use App\Model\Board;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TopPage extends Controller
{
    /**
     * トップページ表示
     * @return Factory|View
     */
    public function index()
    {
        /** @var Board $board */
        $board = new Board();
        $board_list = $board::all();

        return view('top_list', ['board_list' => $board_list]);
    }
}
