<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{   

    
    public function homepage() {
        
        return view('page.homepage');
    }

    

}
