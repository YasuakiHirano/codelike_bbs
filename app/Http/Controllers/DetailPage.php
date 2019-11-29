<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseCreateRequest;
use App\Model\Board;
use App\Model\Message;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailPage extends Controller
{
    /**
     * 初期表示
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        /** @var Board|Collection $board */
        $board = new Board();
        $board_data = $board->find($request->id);

        /** @var Message|Collection $message */
        $message = new Message();
        $messages = $message->where('board_id', '=', $request->id)->get();

        return view("show_bbs", ['board' => $board_data, 'messages' => $messages]);
    }

    /**
     * レスを投稿した時の処理
     * @param ResponseCreateRequest $request
     * @return RedirectResponse
     */
    public function makeResponse(ResponseCreateRequest $request)
    {
        /** @var Message|Collection $message */
        $message = new Message();
        $message->fill([
            'board_id' => $request->board_id,
            'user_name' => $request->user_name,
            'message' => $request->message
        ])->save();

        return redirect()->route("detail.index", ["id" => $request->board_id]);
    }

    /**
     * 掲示板削除処理
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function deleteBoard(Request $request)
    {
        /** @var Board|Collection $board */
        $board = new Board();
        $result = $board->find($request->board_id)->first();

        // パスワードチェック
        if ($request->delete_password === $result->password) {
            $board->find($request->board_id)->delete();
        } else {
            return redirect()->route("detail.index", ['id' => $request->board_id])
                ->withErrors(['パスワードが間違っています。']);
        }
        return redirect()->route("top.index");
    }
}
