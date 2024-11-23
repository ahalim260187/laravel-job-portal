@extends('frontend.layout.master')
@section('content')
    <main class="main">

        <div class="bg-homepage1"></div>

        @include('frontend.home.sections.hero')

        <div class="mt-100"></div>

        @include('frontend.home.sections.job-category')
        {{-- 
        @include('frontend.home.sections.featured-job')
        @include('frontend.home.sections.why-choose-us')

        @include('frontend.home.sections.learn-more')

        @include('frontend.home.sections.counter')

        @include('frontend.home.sections.reqruiter')

        @include('frontend.home.sections.pricing')

        @include('frontend.home.sections.job-location')

        @include('frontend.home.sections.client-testimony')

        @include('frontend.home.sections.news-blog') --}}

    </main>
@endsection
