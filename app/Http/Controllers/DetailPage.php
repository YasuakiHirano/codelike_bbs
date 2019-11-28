<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseCreateRequest;
use App\Model\Board;
use App\Model\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DetailPage extends Controller
{
    public function index(Request $request)
    {
        /** @var Board|Collection $board */
        $board = new Board();
        $board_data = $board::find($request->id);

        /** @var Message|Collection $message */
        $message = new Message();
        $messages = $message::where('board_id', '=', $request->id)->get();

        return view("show_bbs", ['board' => $board_data, 'messages' => $messages]);
    }

    public function makeResponse(ResponseCreateRequest $request)
    {
        $message = new Message();
        $message->fill([
            'board_id' => $request->board_id,
            'user_name' => $request->user_name,
            'message' => $request->message
        ])->save();

        return redirect()->route("detail.index", ["id" => $request->board_id]);
    }
}
