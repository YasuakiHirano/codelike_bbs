<?php

namespace App\Http\Controllers;

use App\Http\UseCase\TopPage\SelectTopPageCase;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TopPage extends Controller
{
    /**
     * トップページ表示
     * @param SelectTopPageCase $case
     * @return Factory|View
     */
    public function index(SelectTopPageCase $case)
    {
        $board_list = $case();
        return view('top_list', ['board_list' => $board_list]);
    }
}
