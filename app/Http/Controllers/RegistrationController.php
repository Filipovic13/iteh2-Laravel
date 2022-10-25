<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrationCollection;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        //return $registrations;
        //return RegistrationResource::collection($registrations);
        return new RegistrationCollection($registrations);
    }

    // public function show($reg_id)
    // {
    //     $reg =Registration::find($reg_id);
    //     if(is_null($reg)){
    //         return response()->json('Data not found',404);
    //     }
    //     return response()->json($reg);
    // }

    public function show(Registration $registration)
    {
        return new RegistrationResource($registration);
    }
}
