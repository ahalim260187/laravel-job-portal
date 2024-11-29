<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.company-dashboard.profile.index');
    }
    public function updateCompanyInfo(Request $request)
    {
        dd($request->all());
    }
}
