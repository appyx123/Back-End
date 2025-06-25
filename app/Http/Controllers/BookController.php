<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmail;

class BookController extends Controller
{
    public function index()
    {
        $data = book::select('id', 'name', 'user_id')
            ->with([
                'user' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->get();

        return view ('book', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->user_id = $request->user_id;
            $book->save();

            return $this->apiResponse("Success");
        } catch (\Throwable $th) {
            return $this->apiResponse($th->getMessage(), 500);
        }
    }

    public function getUser(){
        $data = User::select('id', 'name')
            ->withCount('book')
            ->get();

        return $this->apiResponse('success', 200, $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',

        ]);

        try {
            $book = new Book();
            $book->name = $request->name;
            $book->user_id = $request->user_id;
            $book->save();

            return $this->apiResponse("Success");
        } catch (\Throwable $th) {
            return $this->apiResponse($th->getMessage(),500);
        }
    }


    public function sendEmail(){
        Mail::to('recipient@example.com')->send(new KirimEmail());

        return "Berhasil mengirim email!";
    }
}
