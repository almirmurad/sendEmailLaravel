<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Jobs\SendRegisterEmail;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    //
    public function sendRegisterEmail(){
        
        $nome = 'Almir Murad';
        // $idade = 90;
        
        $client = new User();
        $client->name = $nome;
        $client->password = '123';
        $client->email = 'almir@webmurad.com.br';
        // $client->idade = $idade;

        $client->save();
        
        SendRegisterEmail::dispatch($client);
       
    

    }
}
