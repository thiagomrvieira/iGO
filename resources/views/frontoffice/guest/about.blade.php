@extends('frontoffice.layouts.app')

@section('content')
    <div id="page-front">
        <div class="block-home-top">
            {!! $about->content ?? null !!}
        </div>
    </div>
@endsection

  {{-- @isset($about)
        <strong>
            {{ $about->title ?? null }}
        </strong>
        <br><br>
        {!! $about->content ?? null !!}
    @endisset --}}