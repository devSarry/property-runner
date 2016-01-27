<template id="unit-panel-template">
    <div class="col-md-5 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{ $id = Auth::User()->portfolios()->isActive()->first() }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                @if(Auth::user()->activePortfolios()->buildings()->get())
                    <ul class="list-group">
                        @foreach(\App\Building::find(6)->units() as $building)
                            <li class="list-group-item"> <i class=" fa fa-btn fa-building"></i><a
                                        href="#">{{ $building->name }}</a></li>
                        @endforeach
                    </ul>
                @endif

                <div class="col-md-offset-4">
                    <a href="{{ route('portfolio.building.create', Auth::user()->portfolios()->isActive()->first()->id) }}">
                        <button class="btn btn-success">Add a building</button>
                    </a>

                </div>

            </div>
        </div>
    </div>
</template>