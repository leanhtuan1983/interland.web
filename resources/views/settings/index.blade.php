@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>
                    <div class="row d-flex justify-content-between">
                        <div class="card col-2">
                            <div class="card-header text-center">
                                <a class="text-decoration-none" href="">TOPBAR NAV</a>
                            </div>
                            <div class="card-body m-auto">
                            <i class="bi bi-info-circle" style="font-size: 100px;"></i>
                            </div>  
                        </div>
                        <div class="card col-2">
                            <div class="card-header text-center">
                                <a class="text-decoration-none" href="">NAVIGATOR</a>
                            </div>
                            <div class="card-body m-auto">
                                <i class="bi bi-menu-app" style="font-size: 100px;"></i>
                            </div>  
                        </div>
                        <div class="card col-2">
                            <div class="card-header text-center">
                                <a class="text-decoration-none" href="{{ route('banners.index') }}">BANNER</a>
                            </div>
                            <div class="card-body m-auto">
                                <i class="bi bi-image" style="font-size: 100px;"></i>
                            </div>  
                        </div>
                        <div class="card col-2">
                            <div class="card-header text-center">
                                <a class="text-decoration-none" href="">FIELD</a>
                            </div>
                            <div class="card-body m-auto">
                            <i class="bi bi-bookmark" style="font-size: 100px;"></i>
                            </div>  
                        </div>
                        <div class="card col-2">
                            <div class="card-header text-center">
                                <a class="text-decoration-none" href="">PARTNER</a>
                            </div>
                            <div class="card-body m-auto">
                            <i class="bi bi-people" style="font-size: 100px;"></i>
                            </div>  
                        </div>
                    
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection