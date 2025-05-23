@php  $bannerImage = menu_banner(); @endphp

<div class="position-relative overflow-hidden rounded mb-4" style="height: 220px;">
    <img src="{{ $bannerImage }}" alt="Banner" class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">

    {{-- Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

    {{-- Text --}}
    <div class="position-relative h-100 d-flex align-items-end p-4">
        <h1 class="text-white fw-bold display-6 mb-0">{{ menu_label(Route::currentRouteName()) }}</h1>
    </div>
</div>
