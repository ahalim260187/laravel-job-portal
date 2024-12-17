@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Industry Types</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4>All Industry Types</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" style="height: 40px"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.industry-type.create') }}" class="btn btn-sm btn-primary"><i
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
                                @forelse ($industriTypes as $industryType)
                                    <tr>
                                        <td>{{ $industryType->name }}</td>
                                        <td>{{ $industryType->slug }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-warning">No Data</div>
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
                    @if ($industriTypes->hasPages())
                        {{ $industriTypes->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </section>
@endsection
