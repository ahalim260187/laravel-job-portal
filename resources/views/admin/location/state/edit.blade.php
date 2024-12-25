@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>States</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('admin.states.update', $state->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit State</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country_id"
                                            class="form-control {{ hasError($errors, 'country_id') }} select2">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @selected($country->id == $state->country_id)>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control {{ hasError($errors, 'name') }}"
                                            value="{{ old('name', $state->name) }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>
@endsection
