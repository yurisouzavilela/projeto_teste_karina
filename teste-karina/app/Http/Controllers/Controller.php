<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Clientes;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getClientes(){
        $clientes = Clientes::all();
        return response($clientes, 200);

    }
    public function CreateClientes(Request $request){
        $cliente = new Clientes;
        $cliente->name = $request->name;
        $cliente->cpf = $request->cpf;
        $cliente->save();

        return response()->json([
            "message" => "Cliente adicionado"
        ]);


    }
    public function UpdateClientes(Request $request, $id){

        $cliente = Clientes::find($id);
        $cliente->name = $request->name;
        $cliente->cpf = $request->cpf;
        $cliente->save();

        return response()->json([
            "message" => "Alteração realizada"
        ], 200);
    }
    public function DeleteClientes($id){
        $cliente = Clientes::find($id);
        $cliente->delete();

    }

}
