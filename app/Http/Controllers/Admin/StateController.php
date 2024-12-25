<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StateController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = State::query();
        $query->with('country');
        $this->search($query, ['name']);
        $states = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.location.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        return view('admin.location.state.create', Compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:states,name'],
            'country_id' => ['required', 'integer'],
        ]);

        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
        Notify::createNotify();
        return to_route('admin.states.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $state = State::findOrFail($id);
        $countries = Country::all();
        return view('admin.location.state.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:states,name,' . $id],
            'country_id' => ['required', 'integer'],
        ]);

        $state = State::findOrFail($id);
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
        Notify::updateNotify();
        return to_route('admin.states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            State::findOrFail($id)->delete();
            Notify::deleteNotify();
            return response(['message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response(['message' => 'error'], 500);
        }
    }
}
