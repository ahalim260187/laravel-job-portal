<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    function getStatesOfCountry(string $countryId): Response
    {
        $states = State::select(['id', 'name', 'country_id'])
            ->where('country_id', $countryId)
            ->get();
        return response($states);
    }

    function getCitiesOfState(string $stateId): Response
    {
        $cities = City::select(['id', 'name', 'country_id', 'state_id'])
            ->where('state_id', $stateId)
            ->get();
        return response($cities);
    }
}
