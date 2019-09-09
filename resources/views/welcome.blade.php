@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-blues pb-5 pt-5 pt-md-5">
    </div>

    <div class="container-fluid mt--4">
            <div class="row">
                <div class="col-xl-4 order-xl-1 mt-5 mb-xl-0">
                    <div class="card card-profile">
                        <div class="col-lg-12 text-center">
                        <img src="{{ asset('argon') }}/img/theme/workflow.jpeg" style="width:1300px; height:auto">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('argon') }}/img/theme/workflow.jpeg" style="height:auto">
            </div>
        </div>
    </div> --}}
@endsection
