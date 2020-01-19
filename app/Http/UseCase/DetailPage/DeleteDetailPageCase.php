<?php

namespace App\Http\UseCase\DetailPage;

use App\Model\Board;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\View\Factory;

class DeleteDetailPageCase
{
    public function __invoke($board_id, $delete_password)
    {
        /** @var Board|Collection $board */
        $board = new Board();
        $result = $board->find($board_id)->first();

        // パスワードチェック
        if ($delete_password === $result->password) {
            $board->find($board_id)->delete();
            return true;
        } else {
            return false;
        }
    }
}
