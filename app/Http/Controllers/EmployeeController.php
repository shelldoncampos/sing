<?php

namespace AppHttpControllers;
use IlluminateHttpRequest;
use AppModelsEmployee;
use PDF;

class EmployeeController extends Controller
{
    
   // public function showEmployees()
      //$employee = clientes::all();
      //return view('index', compact('employee'));
      public function showEmployees($id) {
        $employee = clientes::findOrFail($id);
         return view('employee.show',['cliente'=>$cliente]);
      
      }

    
    public function createPDF() 
      
      $data = Employee::all();

      
      view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', $data);

      
      return $pdf->download('pdf_file.pdf');
}