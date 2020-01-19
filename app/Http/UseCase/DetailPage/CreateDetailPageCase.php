<?php

namespace App\Http\UseCase\DetailPage;

use App\Model\Message;
use Illuminate\Support\Collection;

class CreateDetailPageCase
{
    public function __invoke($board_id, $user_name, $param_message)
    {
        /** @var Message|Collection $message */
        $message = new Message();
        $message->fill([
            'board_id' => $board_id,
            'user_name' => $user_name,
            'message' => $param_message
        ])->save();
    }
}
