@extends('frontoffice.layouts.guest.app')

@section('content')

    @isset($contacts)
        <strong>
            {{ $contacts->title ?? null }}
        </strong>
        <br><br>
        {!! $contacts->content ?? null !!}
    @endisset

@endsection