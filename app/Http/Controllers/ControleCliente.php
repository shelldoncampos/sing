<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\clientes; 

class ControleCliente extends Controller
{
    public function index() {
        
       $cliente = clientes::all();

       return view('clientes/lista',['clientes'=>$cliente]);
        
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        
        $cliente= new clientes;

            $cliente->nome = $request -> nome;
            $cliente->cpfcnpj = $request -> cpfcnpj;
            $cliente->rg = $request -> rg;
            $cliente->cep = $request -> cep;
            $cliente->cidade = $request -> cidade;
            $cliente->uf = $request -> uf;
            $cliente->rua = $request -> rua;
            $cliente->bairro = $request -> bairro;
            $cliente->numero = $request -> numero;
            $cliente->complemento = $request -> complemento;
            $cliente->email = $request -> email;
            $cliente->celular = $request -> celular;
            $cliente->qtdequips = $request -> qtdequips;
            $cliente->modelo = $request -> modelo;
            $cliente->imei = $request -> imei;
            $cliente->observ = $request -> observ;
            $cliente->planos = $request -> planos;
            $cliente->marca = $request -> marca;
            $cliente->model = $request -> model;
            $cliente->placa = $request -> placa;
            $cliente->ano = $request -> ano;
            $cliente->cor = $request -> cor;
            $cliente->renavam = $request -> renavam;

    //Upload de Imagem

    if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/clientes'), $imageName);
        
        $cliente->image= $imageName;
    }

        $folderPath = public_path('img/sign/');
        $image_parts = explode(";base64,", $request->signed);             
        $image_type_aux = explode("image/", $image_parts[0]);          
        $image_type = $image_type_aux[1];        
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.'.$image_type;          
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);
        $cliente->sign = $signature;


            $cliente->save();

            return redirect('/');
    }

    public function show($id) {
      $cliente = clientes::findOrFail($id);
       return view('clientes.show',['cliente'=>$cliente]);
    
    }
}

