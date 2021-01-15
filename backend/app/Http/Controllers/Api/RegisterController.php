<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    use ApiTrait;

    public function register(Request $request)
    {
        /** @var Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->apiResponse($validator->messages(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return $this->apiResponse('User registration completed', [], Response::HTTP_OK);
    }
}