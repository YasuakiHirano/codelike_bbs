<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Traits\ApiTrait;
use \Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    use ApiTrait;

    public function create(Request $request) {
        try {
            $message = new Message();
            $message->fill([
                'board_id' => $request->board_id,
                'user_name' => $request->user_name,
                'message' => $request->message
            ])->save();
        } catch(\Throwable $error) {
            logger()->alert($error->getMessage());
            return $this->apiResponse('Message Create Error', [], Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

        return $this->apiResponse('Create message', [], Response::HTTP_OK); 
    }

    public function fetchByBoardId(Request $request) {
        try {
            $messages = Message::whereBoardId($request->board_id)->get();
            return $this->apiResponse(['messages' => $messages], [], Response::HTTP_OK); 
        } catch(\Throwable $error) {
            logger()->alert($error->getMessage());
            return $this->apiResponse('Message Fetch Error', [], Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

        return $this->apiResponse('Fetch messages', [], Response::HTTP_OK); 
    }
}
