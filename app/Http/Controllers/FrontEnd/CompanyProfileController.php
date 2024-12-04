<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use App\Traits\FileUploudTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use FileUploudTrait;
    public function index(): View
    {
        return view('frontend.company-dashboard.profile.index');
    }
    public function updateCompanyInfo(ProfileUpdateRequest $request)
    {
        // dd($request->all());
        $logoPath = $this->uploudFile($request, 'logo');
        $bannerPath = $this->uploudFile($request, 'banner');
        $data = [];
        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );
        return redirect()->back();
    }
}
