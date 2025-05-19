@php($current = app()->getLocale())
@php($params  = request()->route()?->parameters() ?? [])

<select class="form-select form-select-sm w-auto"
        onchange="location = this.value">
    @foreach (config('app.supported_locales') as $loc)
        <option
            value="{{ route(
                        Route::currentRouteName(),
                        array_merge($params, ['locale' => $loc])
                    ) }}"
            {{ $loc === $current ? 'selected' : '' }}>
            {{ strtoupper($loc) }}
        </option>
    @endforeach
</select>
