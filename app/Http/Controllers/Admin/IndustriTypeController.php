<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustriType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndustriTypeController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = IndustriType::query();
        $this->search($query, ['name']);
        $industriTypes = $query->paginate(5);
        return view('admin.industry-type.index', compact('industriTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industri_types,name'],
        ]);

        $type = new IndustriType();
        $type->name = $request->name;
        $type->save();
        Notify::createNotify();
        return to_route('admin.industry-type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $industriTypes = IndustriType::findOrFail($id);
        return view('admin.industry-type.edit', compact('industriTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                'unique:industri_types,name, ' . $id,
            ],
        ]);
        $type = IndustriType::findOrFail($id);
        $type->name = $request->name;
        $type->save();
        Notify::updateNotify();
        return to_route('admin.industry-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IndustriType::findOrFail($id)->delete();
        Notify::deleteNotify();
        return response(['message' => 'Success'], 200);
    }
}
