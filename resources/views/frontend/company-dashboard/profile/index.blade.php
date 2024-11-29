@extends('frontend.layout.master')'
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Profile</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('frontend.company-dashboard.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <div class="row">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Company Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Founding Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Account Setting</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                {{-- Company Info --}}
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <form action="{{ route('company.profile.company-info') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                                    <input class="form-control" type="file" name="logo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                                    <input class="form-control" type="file" name="banner">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                                                <input class="form-control" type="text" name="company-name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                                                <textarea class="form-control" style="height:150px" name="bio"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                                                <textarea class="form-control" style="height:150px" name="vision"></textarea>
                                            </div>
                                        </div>
                                        <div class="box-button mt-15">
                                            <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                                                Changes</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Company Info --}}

                                {{-- Founding Info --}}

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">Organization Type
                                                        *</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Establishment Date
                                                        *</label>
                                                    <div class="input-group date" id="datepicker">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text bg-white d-block">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Website Url</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Email</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Phone</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">Country</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">State</label>
                                                    <select class="form-select form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group select-style">
                                                    <label class="font-sm color-text-mutted mb-10">City</label>
                                                    <select class="form-control form-icons select-active">
                                                        <option value="">Select</option>
                                                        <option value="1">One</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Address</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="box-button mt-15">
                                            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Founding Info --}}

                                {{-- Account Setting --}}
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Username *</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Email *</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-apply-big font-md font-bold">Save</button>
                                    </form>
                                    <div class="mt-30"></div>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10">Password *</label>
                                                    <input class="form-control" type="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-sm color-text-mutted mb-10"> Comfirm Password
                                                        *</label>
                                                    <input class="form-control" type="password">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-apply-big font-md font-bold">Save</button>
                                    </form>
                                </div>
                                {{-- Account Setting --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
