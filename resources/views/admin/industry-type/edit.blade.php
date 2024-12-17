@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Industry Type</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('admin.industry-type.update', $industriTypes->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Industry Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control {{ hasError($errors, 'name') }}"
                                    value="{{ old('name', $industriTypes->name) }}">
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
