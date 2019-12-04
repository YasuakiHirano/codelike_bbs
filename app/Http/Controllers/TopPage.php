<?php

namespace App\Http\Controllers;

use App\Model\Board;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class TopPage extends Controller
{
    /**
     * トップページ表示
     * @return Factory|View
     */
    public function index()
    {
        /** @var Board|Collection|Builder $board */
        $board = new Board();
        $board_list = $board->orderBy("created_at", "desc")->paginate(env("PAGE_MAX_LIMIT"));

        return view('top_list', ['board_list' => $board_list]);
    }
}
