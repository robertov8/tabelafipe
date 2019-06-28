@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('commons.errors')
            </div>

            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        Histórico de consultas
                    </div>

                    <div class="card-body">
                        <div class="card-title">
                            <div class="row justify-content-lg-end">
                                <div class="col-md-6">
                                    @include('history.filter')
                                </div>
                            </div>
                        </div>

                        @include('history.table')
                    </div>

                    <div class="card-footer">
                        @include('history.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
