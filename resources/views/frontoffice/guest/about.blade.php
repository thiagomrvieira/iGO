@extends('frontoffice.layouts.guest.app')

@section('content')

    @isset($about)
        <strong>
            {{ $about->title ?? null }}
        </strong>
        <br><br>
        {!! $about->content ?? null !!}
    @endisset

@endsection