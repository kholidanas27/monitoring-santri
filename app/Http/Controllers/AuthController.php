<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;
use Exception;


class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        try {
            $result = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return response()->json($result);
        } catch (Exception $ex) {
            return response()->json(
                ['message' => $ex->getMessage()],
                500
            );
        }
    }

    public function login(AuthLoginRequest $request)
    {
        try {
            $data = [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'L8HdCVbdeDzWT1oGoyorJL9FIqtTtjwN0VWXH3Rd',
                'username' => $request->username,
                'password' => $request->password
            ];
            $httpResponse = app()->handle(
                Request::create('/oauth/token', 'POST', $data)
            );
            if ($httpResponse->isOk()) {
                $res = $httpResponse->getContent();
                $res = json_decode($res, true);
                return $res;
            } else {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return response($httpResponse, $httpResponse->status());
        } catch (Exception $ex) {
            return response()->json(
                ['message' => $ex->getMessage()],
                500
            );
        }
    }

    public function me(Request $request)
    {
        try {
            return response()->json($request->user('api'));
        } catch (Exception $ex) {
            return response()->json(
                ['message' => $ex->getMessage()],
                500
            );
        }
    }

    public function logout(Request $request)
    {
        try {
            return response()->json(
                $request->user('api')
                    ->token()
                    ->revoke()
            );
        } catch (Exception $ex) {
            return response()->json(
                ['message' => $ex->getMessage()],
                500
            );
        }
    }
}
