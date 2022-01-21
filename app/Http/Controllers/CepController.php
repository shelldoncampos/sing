<?php

class CepController extends Controller
{
    public function getIndex(Request $request)
    {
        $results = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $request->get('cep'));

        return response()
            ->json($results);
    }
}
