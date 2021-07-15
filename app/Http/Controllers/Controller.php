<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Controller extends BaseController
{
/**
* @OA\Info(
*    title="Documentacion API - Prueba Tecnica", 
*    version="1.0" , 
*    description="Documentacion elaborada con swagger para prueba tecnica (by Andres Cuevas)", 
*    @OA\Contact(
*       email="andres-felipe32@hotmail.com"
*    )
* )
* 
*/
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
