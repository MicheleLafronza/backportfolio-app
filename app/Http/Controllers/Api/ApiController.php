<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //mi serve una funzione che ritorni un json con tutti i progetti
    public function allProjects(){

        $data = Project::all();

        return response()->json($data);
    }
}
