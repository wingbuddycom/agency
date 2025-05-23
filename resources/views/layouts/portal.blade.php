@extends('layouts.app')
@section('body')
    <main class="container-fluid vh-100 bg-light">
        <div class="row min-vh-100">
            <div class="col-12 col-md-3 col-lg-2 bg-gray-300 p-0 m-0">
                @include('components.dashboardSideMenu')
            </div>
            <div class="col-12 col-md-9 col-lg-10 bg-white">
                @include('components.titleBanner')
                @include('components.dashboardTable')
                @yield('content')
            </div>
        </div>
    </main>
@endsection

