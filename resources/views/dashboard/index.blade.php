@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if(Auth::user()->hasPortfolio())
                @include('dashboard._buildingPanel')
            @else
                @include('dashboard.createPortfolioPanel')
            @endif

            @if(Auth::user()->hasPortfolio())
                    <units-panel folio="{{ Auth::user()->activePortfolio()->id }}">Hello</units-panel>
            @endif



        </div>
    </div>
@endsection
