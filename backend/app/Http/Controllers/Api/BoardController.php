<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Traits\ApiTrait;
use \Symfony\Component\HttpFoundation\Response;

class BoardController extends Controller
{
    use ApiTrait;

    public function create(Request $request) {
        try {
            $board = new Board();
            $board->fill([
                'title' => $request->title,
                'user_name' => $request->user_name,
                'content' => $request->content
            ])->save();
        } catch(\Throwable $error) {
            logger()->alert($error->getMessage());
            return $this->apiResponse('Board Create Error', [], Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

        return $this->apiResponse('Create board', [], Response::HTTP_OK); 
    }

    public function fetch(Request $request) {
        try {
            $boards = Board::all();
            return $this->apiResponse(['boards' => $boards], [], Response::HTTP_OK); 
        } catch(\Throwable $error) {
            logger()->alert($error->getMessage());
            return $this->apiResponse('Board Create Error', [], Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

        return $this->apiResponse('Create board', [], Response::HTTP_OK); 
    }
}
