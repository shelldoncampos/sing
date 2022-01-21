<?php
   
namespace App\Http\Controllers;   
use Illuminate\Http\Request;
use App\Models\clientes;  
use PDF;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = clientes::findOrFail($id);

        $pdf = PDF::loadView('gerapdf',['data'=>$data]);
        return $pdf->setPaper('a4') ->stream('contrato_localizasat.pdf');
    }


}