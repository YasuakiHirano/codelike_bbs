<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Traits\ApiTrait;
use \Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use ApiTrait;

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            return $this->apiResponse('Loggin Success', [], Response::HTTP_OK);
        }
 
        return $this->apiResponse('User Not Found.', [], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function logout(Response $response)
    {
        Auth::guard('web')->logout();
        return $this->apiResponse('Logout Success', [], Response::HTTP_OK);
    }
}
