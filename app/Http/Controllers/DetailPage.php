<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DetailPage extends Controller
{
    public function index(Request $request)
    {
        /** @var Board | Collection $board */
        $board = new Board();
        $message = $board::find($request->id);
        return view("show_bbs", ['message' => $message]);
    }
}
