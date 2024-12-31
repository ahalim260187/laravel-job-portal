<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\CandidateBasicInfoUpdateRequest;
use App\Models\Candidate;
use App\Services\Notify;
use App\Traits\FileUploudTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{
    use FileUploudTrait;
    public function index(): View
    {
        return view('frontend.candidate-dashboard.profile.index');
    }

    public function basicInfoUpdate(CandidateBasicInfoUpdateRequest $request): RedirectResponse
    {
        $imagePath = $this->uploudFile($request, 'profile_picture');
        $cvPath = $this->uploudFile($request, 'cv');

        $data = [];
        if (!empty($imagePath)) $data['image'] = $imagePath;
        if (!empty($cvPath)) $data['cv'] = $cvPath;
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;

        Candidate::updateOrCreate(['user_id' => auth()->user()->id], $data);
        Notify::updateNotify();
        return redirect()->back();
    }
}
