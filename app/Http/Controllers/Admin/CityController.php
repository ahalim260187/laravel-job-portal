<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = City::query();
        $query->with('state', 'country');
        $this->search($query, ['name']);
        $cities = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.location.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        return view('admin.location.city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:cities,name'],
            'state_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->country_id = $request->country_id;
        $city->save();
        Notify::createNotify();
        return to_route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $city = City::findOrFail($id);
        $countries = Country::all();
        $states = State::where('country_id', $city->country_id)->get();
        return view(
            'admin.location.city.edit',
            compact('city', 'countries', 'states')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:cities,name,' . $id,
            ],
            'state_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->country_id = $request->country_id;
        $city->save();
        Notify::updateNotify();
        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            City::findOrFail($id)->delete();
            Notify::deleteNotify();
            return response(['message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response(['message' => 'error'], 500);
        }
    }
}
