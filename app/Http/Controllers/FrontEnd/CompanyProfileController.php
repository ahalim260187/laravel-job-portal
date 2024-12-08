<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\AccountInfoUpdateRequest;
use App\Http\Requests\FrontEnd\FoundingInfoUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use App\Traits\FileUploudTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class CompanyProfileController extends Controller
{
    use FileUploudTrait;
    public function index(): View
    {
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();
        return view(
            'frontend.company-dashboard.profile.index',
            compact('companyInfo')
        );
    }
    public function updateCompanyInfo(
        ProfileUpdateRequest $request
    ): RedirectResponse {
        $logoPath = $this->uploudFile($request, 'logo');
        $bannerPath = $this->uploudFile($request, 'banner');
        $data = [];
        if (!empty($logoPath)) {
            $data['logo'] = $logoPath;
        }
        if (!empty($bannerPath)) {
            $data['banner'] = $bannerPath;
        }
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(['user_id' => auth()->user()->id], $data);
        notify()->success('Company Info updated successfully');
        return redirect()->back();
    }

    public function updateFoundingInfo(
        FoundingInfoUpdateRequest $request
    ): RedirectResponse {
        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'industry_type_id' => $request->industry_type,
                'organization_size_id' => $request->organization_size,
                'team_size_id' => $request->team_size,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website_url,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]
        );
        notify()->success('Founding Info updated successfully');
        return redirect()->back();
    }

    public function updateAccountInfo(
        AccountInfoUpdateRequest $request
    ): RedirectResponse {
        Auth::user()->update([
            'name' => $request->username,
            'email' => $request->email,
        ]);

        notify()->success('Account Info updated successfully');
        return redirect()->back();
    }

    public function updatePasswordInfo(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => bcrypt($request->password),
        ]);

        notify()->success('Password updated successfully');
        return redirect()->back();
    }
}
