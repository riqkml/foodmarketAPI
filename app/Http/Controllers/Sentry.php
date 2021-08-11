<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class Sentry extends Controller
{
    public function debugSentry () {
        try {
            User::find(99);
        }catch(Exception $error){
            return $error;
        }
    }
}
