<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarAgentController extends Controller
{
    public function index(){
        return view('agent.index');
    }
}
