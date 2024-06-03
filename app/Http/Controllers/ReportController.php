<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function report()
    {
        $reports = DB::table('reports')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->select('users.*', 'reports.*')
            ->get();
        return view('reports.reports', ['reports'=>$reports]);
    }
}
