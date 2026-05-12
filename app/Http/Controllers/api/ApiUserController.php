<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return response()->json([
            'status' => 'success',
            'data' => $users
        ], 200);
    }
}