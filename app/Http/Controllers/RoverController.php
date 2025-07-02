<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoverController extends Controller
{
    public function move(Request $request) {
        $data = $request->validate([
            'x'         => 'required|integer|min:0|max:199',
            'y'         => 'required|integer|min:0|max:199',
            'direction' => 'required|string|in:N,S,E,W',
            'commands'  => 'required|string'
        ]);

        // respuesta de ejemplo
        return response()->json(['info' => $data]);
    }
}
