<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rover;

class RoverController extends Controller
{
    public function move(Request $request) {
        $data = $request->validate([
            'x'         => 'required|integer|min:0|max:199',
            'y'         => 'required|integer|min:0|max:199',
            'direction' => 'required|string|in:N,S,E,W',
            'commands'  => 'required|string'
        ]);

        $rover = new Rover($data['x'], $data['y'], $data['direction']);
        $result = $rover->move($data['commands']);

        // respuesta de ejemplo
        return response()->json($result);
    }
}
