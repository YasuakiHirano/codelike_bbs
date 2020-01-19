<?php

namespace App\Http\UseCase\DetailPage;

use App\Model\Board;
use App\Model\Message;
use Illuminate\Support\Collection;

class SelectDetailPageCase
{
    public function __invoke($id)
    {
        /** @var Board|Collection $board */
        $board = new Board();
        $board_data = $board->find($id);

        /** @var Message|Collection $message */
        $message = new Message();
        $messages = $message->where('board_id', '=', $id)->get();

        return array($board_data, $messages);
    }
}
