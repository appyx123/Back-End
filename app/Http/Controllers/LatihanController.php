<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LatihanController extends Controller
{

    public function index(Request $request)
    {
        try {
            $data = User::select('id', 'name', 'email')
                ->when($request->filled('name'), fn($q) => $q->where('name', 'like', '%' . $request->name . '%'))
                ->when($request->filled('email'), fn($q) => $q->where('email', 'like', '%' . $request->email . '%'))
                ->get();

            return $this->apiResponse($data, 200, "Data berhasil diambil");
        } catch (\Throwable $th) {
            return $this->apiResponse(
                null,
                500,
                'Terjadi kesalahan saat mengambil data',
                $th->getMessage(),
                $th->getFile(),
                $th->getLine()
            );
        }
    }

}
