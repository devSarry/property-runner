@if(Auth::user() && Auth::user()->hasPortfolio())
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->activePortfolio()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                @if(Auth::user()->portfolios()->get()->count() > 1)
                    @foreach(Auth::user()->portfolios()->get() as $portfolio)
                        <li><a href="{{ route('portfolio.show', $portfolio->id) }}">
                                <i class="fa fa-btn fa-th-list "></i>{{ $portfolio->name  }}
                            </a>
                        </li>
                    @endforeach
                @endif
                <li><a href="{{ route('portfolio.create') }}">
                        <i class="fa fa-btn fa-plus"></i>Create New Portfolio
                    </a>
                </li>
            </ul>
        </li>
    </ul>
@endif
