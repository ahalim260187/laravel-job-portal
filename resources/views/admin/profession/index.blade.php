@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Professions</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4>All Professions</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.professions.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="height: 40px"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.professions.create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-plus-circle"></i> Create New</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($professions as $profession)
                                    <tr>
                                        <td>{{ $profession->name }}</td>
                                        <td>{{ $profession->slug }}</td>
                                        <td>

                                            <a href="{{ route('admin.professions.edit', $profession->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.professions.destroy', $profession->id) }}"
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
            <div class="card-footer text-right bg-white">
                <nav class="d-inline-block">
                    @if ($professions->hasPages())
                        {{ $professions->withQueryString()->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </section>
@endsection