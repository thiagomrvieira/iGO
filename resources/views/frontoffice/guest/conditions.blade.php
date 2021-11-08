@extends('frontoffice.layouts.app')

@section('content')

<div id="page-front">
    <div class="block-home-top">
        <div class="main-fluid">
            <div class="limit-wrapper">
                <div class="block-conditions">
                    <div class="block-conditions-title">
                        <h2>{{ $conditions->title ?? null }}</h2>
                    </div>
                    <div class="block-conditions-body">
                        {!! $conditions->content ?? null !!}
                        {{--
                        <div>
                            <h3>Utilização do serviço</h3>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.  Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                        </div>
                        <div>
                            <h3>Registo</h3>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                        </div>
                        <div>
                            <h3>Privacidade:</h3>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                            <p>Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum. Erat pulvinar suspendisse qui ac vitae, a venenatis, Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, magni libero amet, eros placerat vehicula massa porta, sodales elementum nunc mi et feugiat, mi ipsum.</p>
                        </div> 
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- @isset($conditions)
        <strong>
            {{ $conditions->title ?? null }}
        </strong>
        <br><br>
        {!! $conditions->content ?? null !!}
    @endisset --}}

@endsection