@extends('frontoffice.layouts.guest.app')

@section('content')

    @isset($conditions)
        <strong>
            {{ $conditions->title ?? null }}
        </strong>
        <br><br>
        {!! $conditions->content ?? null !!}
    @endisset

@endsection