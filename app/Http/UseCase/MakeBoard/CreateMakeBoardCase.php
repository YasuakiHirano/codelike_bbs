<?php

namespace App\Http\UseCase\MakeBoard;

use App\Model\Board;

class CreateMakeBoardCase
{
    public function __invoke($board_title, $user_name, $about_text, $password)
    {
        /** @var Board $board */
        $board = new Board();
        $board->fill([
            'title' => $board_title,
            'user_name' => $user_name,
            'about_text' => $about_text,
            'password' => $password
        ])->save();
    }
}
