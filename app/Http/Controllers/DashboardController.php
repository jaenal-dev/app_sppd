<?php

namespace App\Http\Controllers;

use App\Models\Nppd;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::count(),
            'nppd' => Nppd::count()
        ]);
    }
}
