<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Livro;

class BookControler extends Controller
{
    //
    public function createBook(Request $request){
        $array = ['error' => ''];

        $rules = [
            'genero' => 'required|min:3',
            'titulo' => 'required|min:3',
            'escritor' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);



        if($validator->fails()){

            $array['error'] = $validator->errors()->getMessages();
            return $array;
        }

        $genero = $request->input('genero');
        $titulo = $request->input('titulo');
        $escritor = $request->input('escritor');

        $livro = new Livro();
        $livro->FK_genero =$genero;
        $livro->titulo = $titulo;
        $livro->escritor = $escritor;

        $livro->save();

        $message = [
            'message'=> 'Livro cadastrado com sucesso!',
            'book'=> $livro,

        ];

        return json_encode($message);

    }
    public function readAllBooks(){

    }
    public function readBook(){

    }
    public function updateBook(){

    }
    public function deleteBook(){

    }
}
