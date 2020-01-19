<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseCreateRequest;
use App\Http\UseCase\DetailPage\CreateDetailPageCase;
use App\Http\UseCase\DetailPage\DeleteDetailPageCase;
use App\Http\UseCase\DetailPage\SelectDetailPageCase;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailPage extends Controller
{
    /**
     * 初期表示
     * @param Request $request
     * @param SelectDetailPageCase $case
     * @return Factory|View
     */
    public function index(Request $request, SelectDetailPageCase $case)
    {
        list($board_data, $messages) = $case($request->id);
        return view("show_bbs", ['board' => $board_data, 'messages' => $messages]);
    }

    /**
     * レスを投稿した時の処理
     * @param ResponseCreateRequest $request
     * @param CreateDetailPageCase $case
     * @return RedirectResponse
     */
    public function makeResponse(ResponseCreateRequest $request, CreateDetailPageCase $case)
    {
        $case($request->board_id, $request->user_name, $request->message);
        $request->flashOnly(['user_name']);
        return redirect()->route("detail.index", ["id" => $request->board_id]);
    }

    /**
     * 掲示板削除処理
     * @param Request $request
     * @param DeleteDetailPageCase $case
     * @return RedirectResponse
     * @throws Exception
     */
    public function deleteBoard(Request $request, DeleteDetailPageCase $case)
    {
        if ($case($request->board_id, $request->delete_password) == false) {
            return redirect()->route("detail.index", ['id' => $request->board_id])
                ->withErrors(['パスワードが間違っています。']);
        } else {
            return redirect()->route("top.index");
        }
    }
}
