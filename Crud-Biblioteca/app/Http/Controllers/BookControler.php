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


        //Validando
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

        // Criando o registro
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

        $array = ['error' => ''];

        $array['list'] = Livro::all();

        return $array;

    }
    public function readBook($id){
        $array = ['error' => ''];

        $livro = Livro::find($id);

        if($livro) {
            $array['livro'] = $livro;
        }else{
            $array['error'] = 'Nao existe o livro de id: '.$id.' aqui';
        }

        return $array;
    }
    public function updateBook($id, Request $request){
        $array = ['error => '];

        //Validando
        $rules = [
            'genero' => 'min:3',
            'titulo' => 'min:3',
            'escritor' => 'min:3'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            $array['error'] = $validator->errors()->getMessages();
            return $array;
        }

        $genero = $request->input('genero');
        $titulo = $request->input('titulo');
        $escritor = $request->input('escritor');

        //Atualizando o item
        $livro = Livro::find($id);
        if($livro){

            if($genero){
                $livro->genero = $genero;
            }

            if($titulo){
                $livro->titulo = $titulo;
            }

            if($escritor){
                $livro->escritor = $escritor;
            }

            $livro->save();

        }else {
            $array['error'] = 'Livro '.$id.' não existe';
        }

        return $array;
    }
    public function deleteBook($id){
        $array = ['error' => ''];

        $livro = Livro::find($id);
        $livro->delete();

        return $array;
    }
}
