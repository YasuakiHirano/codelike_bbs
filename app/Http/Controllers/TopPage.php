<?php

namespace App\Http\Controllers;

use App\Model\Board;
use Illuminate\Http\Request;

class TopPage extends Controller
{
    public function index()
    {
        /** @var Board $board */
        $board = new Board();
        $board_list = $board::all();

        return view('top_list', ['board_list' => $board_list]);
    }
}
