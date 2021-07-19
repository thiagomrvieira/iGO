@extends('frontoffice.layouts.guest.app')

@section('content')

{{-- @php
    App::setLocale('en');
@endphp --}}

    @isset($about)
        <strong>
            {{ $about->title ?? null }}
        </strong>
        <br><br>
        {!! $about->content ?? null !!}
    @endisset

@endsection