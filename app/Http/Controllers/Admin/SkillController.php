<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SkillController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Skill::query();
        $this->search($query, ['name']);
        $skills = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.skill.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name'],
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->save();
        Notify::createNotify();
        return to_route('admin.skills.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:skills,name,' . $id],
        ]);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->save();
        Notify::updateNotify();
        return Redirect::route('admin.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Skill::findOrFail($id)->delete();
            Notify::deleteNotify();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            return response(['message' => 'error'], 500);
        }
    }
}
