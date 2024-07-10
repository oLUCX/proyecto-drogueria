<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DateTime;

class UserController extends Controller
{
    public function index()
    {
        $response = Http::get('https://test.drogueriahofmann.cl/usuarios/ListTableUsers');
        $users = $response->json();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $response = Http::get('https://test.drogueriahofmann.cl/usuarios/ListTableUsers');
        $users = $response->json();

        $user = collect($users)->firstWhere('id', $id);
        return response()->json($user);
    }

    public function getUsers()
    {
        $response = Http::get('https://test.drogueriahofmann.cl/usuarios/GetUsers');
        return response()->json($response->json());
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::post('https://test.drogueriahofmann.cl/usuarios/SendUser', [
                'id' => $id,
                'code' => $request->code,
                'amount' => $request->amount,
                'date' => $request->date,//(new DateTime($request->date))->format('Y-m-d\TH:i:s.u\Z'),
                'github' => $request->github,
            ]);
            return response()->json(['status' => $response->status()]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
