<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use App\Models\Admin\Lead;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        // validazione

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
