<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Board;
use \Symfony\Component\HttpFoundation\Response;

class BoardController extends Controller
{
    public function create(Request $request) {
        try {
            $board = new Board();
            $board->fill([
                'title' => $request->title,
                'user_name' => $request->userName,
                'content' => $request->content,
                'password' => $request->password
            ])->save();
        } catch(\Throwable $error) {
            logger()->alert($error->getMessage());
            return response()->json('Board Create Error', Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

        return response()->json('Create board', Response::HTTP_OK); 
    }
}
