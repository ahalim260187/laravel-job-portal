@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Organization Type</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('admin.organization-type.update', $organizationTypes->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Organization Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control {{ hasError($errors, 'name') }}"
                                    value="{{ old('name', $organizationTypes->name) }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
