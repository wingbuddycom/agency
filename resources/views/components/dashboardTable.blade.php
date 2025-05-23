@php
    $routeKey = Route::currentRouteName();
    $tableLabels = __('content.' . $routeKey . '.table');
    $tableLabels = is_array($tableLabels) ? $tableLabels : [];
@endphp
@if(sizeof($tableLabels) > 0)
    <div class="table-responsive">
        <table class="table table-sm table-hover align-middle mb-0 dashboard-table">
            <thead class="table-light">

            @foreach($tableLabels as $label)
                <th scope="col" class="text-nowrap">{{ $label }}</th>
            @endforeach

            </thead>
            <tbody>

            @yield('tableBody')

            </tbody>
        </table>
    </div>
@endif

