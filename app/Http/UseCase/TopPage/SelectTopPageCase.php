<?php

namespace App\Http\UseCase\TopPage;

use App\Model\Board;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class SelectTopPageCase
{
    public function __invoke()
    {
        /** @var Board|Collection|Builder $board */
        $board = new Board();
        $board_list = $board->orderBy("created_at", "desc")->paginate(env("PAGE_MAX_LIMIT"));

        return $board_list;
    }
}
