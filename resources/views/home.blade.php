@extends('layouts.app')

@routes
@section('content')
<div class="container">
    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Esto no deberia de cargar...
                </div>
            </div>
        </div>
    </div>--}}
    <example-component></example-component>
</div>
@endsection
