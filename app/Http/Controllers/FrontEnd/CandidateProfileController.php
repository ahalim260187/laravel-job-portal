<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.candidate-dashboard.profile.index');
    }

    public function basicInfoUpdate(Request $request): RedirectResponse
    {
        dd($request->all());
        return redirect()->back();
    }
}
