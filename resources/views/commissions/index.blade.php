@extends('layouts.portal')

@section('title', __('content.bookings.title'))

@section('content')

@endsection

@section('tableBody')
    <tr>
        @foreach(__('content.commissions.table') as $label)
            <td class="text-nowrap">{{ $label }}</td>
        @endforeach
    </tr>
@endsection
