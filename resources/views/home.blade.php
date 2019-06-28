@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('commons.errors')
        </div>

        <div class="col-md-12">
            @include('consulta.painel')
        </div>

        @isset($result)
            @if($result)
                <div class="col-md-12 mt-5">
                    @include('consulta.resultado')
                </div>
            @else
                <div class="col-md-12 mt-5">
                    @include('consulta.erro')
                </div>
            @endif
        @endif
    </div>
</div>
@endsection


