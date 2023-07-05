<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use App\Models\Admin\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        // validazione
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);


        // validazione non a buon fine
        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }

        // salvataggio dati nel db
        // metodo 1
        // $new_lead = new Lead();
        // $new_lead->fill($data);
        // $new_lead->save();


        // metodo abbreviato
        $new_lead= Lead::create($data);

        // invio della mail
        Mail::to('info@boolpress.it')->send(new NewContact($new_lead));
        // ottenere una risposta positiva in json

        return response()->json(
            [
                'success' => true
            ]
            );
    }
}
