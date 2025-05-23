@php $lang = app()->getLocale(); @endphp

<nav class="navbar p-0 m-0 flex-column dashboard-side-menu">
    <button class="d-none navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="list-unstyled flex-column w-100">
        <li>
            <span class="fw-semibold nav-link">
                <span class="nav-icon">{!! __(config('menu.agency.icon')) !!}</span> {{ __(config('menu.agency.title')) }}
            </span>
            <ul class="p-0 list-unstyled">
                @if (config('menu.agency.items'))
                @foreach (config('menu.agency.items') as $sideMenuItem)
                    <li class="">
                        <a class="p-2 nav-link {{ request()->is("$lang/{$sideMenuItem['route']}") ? 'active' : '' }}"
                            href="{{ routeL($sideMenuItem['route']) }}">
                            <span class="nav-icon">{!! $sideMenuItem['icon'] !!}</span> {{ menu_label($sideMenuItem['key']) }}
                        </a>
                    </li>
                @endforeach
                @endif
            </ul>
        </li>
    </ul>
</nav>
