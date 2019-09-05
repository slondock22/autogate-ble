@extends('layouts.app', ['title' => __('Loggings')])

@section('content')
    <div class="header bg-gradient-blues pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Logs') }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('#') }}</th>
                                    <th scope="col">{{ __('Truk') }}</th>
                                    <th scope="col">{{ __('TID') }}</th>
                                    <th scope="col">{{ __('UUID') }}</th>
                                    <th scope="col">{{ __('Major') }}</th>
                                    <th scope="col">{{ __('Minor') }}</th>
                                    <th scope="col">{{ __('Gate In') }}</th>
                                    <th scope="col">{{ __('Gate Out') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($loggings as $logging)
                                    <tr>
                                        <td>{{ $i }} @php $i++; @endphp</td>
                                        <td>{{ $logging->no_polisi }}</td>
                                        <td>{{ $logging->no_tid }}</td>
                                        <td>{{ $logging->uuid }}</td>
                                        <td>{{ $logging->major }}</td>
                                        <td>{{ $logging->minor }}</td>
                                        <td>{{ $logging->gate_in }}</td>
                                        <td>{{ $logging->gate_out }}</td>
                                        <td>
                                            @if($logging->is_auth == 1)
                                            <span class="badge badge-success">{{__('Authorized')}}</span>
                                            @elseif($logging->is_auth == 2)
                                            <span class="badge badge-danger">{{__('Not Authorized')}}</span>
                                            @else 
                                            <span class="badge badge-default">{{__('Unregistered')}}</span>
                                            @endif
                                        </td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $loggings->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection