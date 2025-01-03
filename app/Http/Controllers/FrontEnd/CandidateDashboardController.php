<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateDashboardController extends Controller
{
    public function index(): View
    {
        return view('frontend.candidate-dashboard.dashboard');
    }
}
