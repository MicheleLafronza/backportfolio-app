<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //mi serve una funzione che ritorni un json con tutti i progetti
    public function allProjects(){

        $data = Project::all();

        return response()->json($data);
    }


    // chiamata per un progetto singolo
    public function oneProject(Project $project){

        if (!$project){
            return response()->json(['message' => 'Il progetto non esiste']);
        } else {
            return response()->json($project);
        }

       
    }

    // chiamata per creazione messaggio
    public function contact(Request $request){
        // validazione 
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'message' => 'required|string'
        ]);

        $data = $request->only(['email', 'message']);

        Message::create($data);

        // Invia l'email
        Mail::raw($request->message, function ($message) use ($request) {
        $message->to('michele.lafronza91@gmail.com') // Sostituisci con la tua email
                ->from($request->email)
                ->subject('Nuovo Messaggio dal Portfolio');
        });

    }
}
