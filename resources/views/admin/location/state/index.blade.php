@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>States</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4>All States</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.states.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search"
                                        value="{{ old('search') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="height: 40px"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.states.create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-plus-circle"></i> Create New</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                @forelse ($states as $state)
                                    <tr>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->country->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.states.edit', $state->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.states.destroy', $state->id) }}"
                                                class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-warning">No Result Found</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    @if ($states->hasPages())
                        {{ $states->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </section>
@endsection