@extends('frontoffice.layouts.guest.app')

@section('content')

    @isset($faq)
        <strong>
            {{ $faq->title ?? null }}
        </strong>
        <br><br>
        {!! $faq->content ?? null !!}
    @endisset

@endsection