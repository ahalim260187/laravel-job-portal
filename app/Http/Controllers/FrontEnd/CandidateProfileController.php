<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\CandidateBasicInfoUpdateRequest;
use App\Http\Requests\FrontEnd\CandidateProfileUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\FileUploudTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CandidateProfileController extends Controller
{
    use FileUploudTrait;

    public function index(): View
    {
        $candidate = Candidate::with(['skills', 'languages'])
            ->where('user_id', auth()->user()->id)
            ->first();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();
        return view(
            'frontend.candidate-dashboard.profile.index',
            compact('candidate', 'professions', 'skills', 'languages')
        );
    }

    public function basicInfoUpdate(
        CandidateBasicInfoUpdateRequest $request
    ): RedirectResponse {
        $imagePath = $this->uploudFile($request, 'profile_picture');
        $cvPath = $this->uploudFile($request, 'cv');

        $data = [];
        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }
        if (!empty($cvPath)) {
            $data['cv'] = $cvPath;
        }
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;

        Candidate::updateOrCreate(['user_id' => auth()->user()->id], $data);
        Notify::updateNotify();
        return redirect()->back();
    }

    public function profileInfoUpdate(
        CandidateProfileUpdateRequest $request
    ): RedirectResponse {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'profession_id' => $request->profession,
                'status' => $request->availability,
                'bio' => $request->bio,
            ]
        );
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        CandidateSkill::where('candidate_id', $candidate->id)->delete();
        foreach ($request->skills as $skill) {
            $skills = new CandidateSkill();
            $skills->candidate_id = $candidate->id;
            $skills->skill_id = $skill;
            $skills->save();
        }

        CandidateLanguage::where('candidate_id', $candidate->id)->delete();
        foreach ($request->language as $language) {
            $languages = new CandidateLanguage();
            $languages->candidate_id = $candidate->id;
            $languages->language_id = $language;
            $languages->save();
        }

        Notify::updateNotify();
        return redirect()->back();
    }
}
