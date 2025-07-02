<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoverController extends Controller
{
    public function move(Request $request) {
        $data = $request->validate([]);

        // respuesta de ejemplo
        return response()->json(['status' => "OK"]);
    }
}
