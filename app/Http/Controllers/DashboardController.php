<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
