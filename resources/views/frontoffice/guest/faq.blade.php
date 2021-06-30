@extends('frontoffice.layouts.guest.app')

@section('content')

    <div class="container">
        <div class="panel-group" id="accordion">
            @php
                $count = 0;
            @endphp
            @foreach ($content as $faq)
                @php
                    $count++;
                @endphp
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="{{'#collapse'.$count}}">{{ $faq->title ?? null }}</a>
                        </h4>
                    </div>
                    <div id="{{'collapse'.$count}}" class="panel-collapse collapse {{$count == 1 ? 'in' : ''}}">
                        <div class="panel-body">
                            {!! $faq->content ?? null !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
                
@endsection