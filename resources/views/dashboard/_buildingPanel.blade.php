<div class="col-md-5 col-md-offset-1">
    <div class="panel panel-success">
        <div class="panel-heading">Buildings</div>

        <div class="panel-body">

            @if(Auth::user()->activePortfolio()->buildings()->get())
                <ul class="list-group">
                    @foreach(Auth::user()->activePortfolio()->buildings()->get() as $building)
                        <li class="list-group-item"> <i class=" fa fa-btn fa-building"></i><a
                                href="#">{{ $building->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            <div class="col-md-offset-4">
                <a href="{{ route('building.create') }}">
                    <button class="btn btn-success">Add a building</button>
                </a>

            </div>

        </div>
    </div>
</div>