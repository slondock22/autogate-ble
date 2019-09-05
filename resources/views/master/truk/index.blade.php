@extends('layouts.app', ['title' => __('Master Truk')])

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
                                <h3 class="mb-0">{{ __('Master Truk') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('master.truk.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Truk') }}</a>
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
                                    <th scope="col">{{__('#')}}</th>
                                    <th scope="col">{{ __('No Polisi') }}</th>
                                    <th scope="col">{{ __('No TID') }}</th>
                                    {{-- <th scope="col">{{ __('Nama Supir') }}</th> --}}
                                    <th scope="col">{{ __('Perusahaan') }}</th>
                                    <th scope="col">{{ __('UUID') }}</th>
                                    <th scope="col">{{ __('Major') }}</th>
                                    <th scope="col">{{ __('Minor') }}</th>
                                    <th scope="col">{{ __('Authorized') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($truk as $truks)
                                    <tr>
                                        <td>{{ $i }} @php $i++; @endphp</td>
                                        <td>{{ $truks->no_polisi }}</td>
                                        {{-- <td>{{ $truks->nama_supir }}</td> --}}
                                        <td>{{ $truks->no_tid }}</td>
                                        <td>{{ $truks->nama_perusahaan }}</td>
                                        <td>{{ $truks->uuid }}</td>
                                        <td>{{ $truks->major }}</td>
                                        <td>{{ $truks->minor }}</td>
                                        <td>
                                            @if($truks->is_auth)
                                            <span class="badge badge-success">{{__('Authorized')}}</span>
                                            @else 
                                            <span class="badge badge-danger">{{__('Not Authorized')}}</span>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('master.truk.destroy', $truks->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <a class="dropdown-item" href="{{ route('master.truk.edit', $truks->id) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this truk?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $truk->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection