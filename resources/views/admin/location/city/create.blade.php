@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cities</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('admin.cities.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create CitY</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country_id"
                                            class="form-control {{ hasError($errors, 'country_id') }} select2 country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select name="state_id"
                                            class="form-control {{ hasError($errors, 'country_id') }} select2 state">
                                            <option value="">Select State</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control {{ hasError($errors, 'name') }}"
                                            value="{{ old('name') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').change(function() {
                let country_id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.get.states', ':id') }}".replace(':id', country_id),
                    data: {},
                    success: function(response) {
                        let html = '';
                        response.forEach(function(state) {
                            html +=
                                `<option value="${state.id}">${state.name}</option>`;
                        });
                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
