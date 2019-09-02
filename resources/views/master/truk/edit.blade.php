@extends('layouts.app', ['title' => __('Edit Truck')])

@section('content')
    <div class="header bg-gradient-blues pb-5 pt-5 pt-md-8">
    </div> 

    <div class="container-fluid mt--4">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ubah Truk') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('master.truk') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('master.truk.update') }}" autocomplete="on">
                            @csrf
                            @method('put')

                            <div class="pl-lg-3">
                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi Kendaraan') }}</h6>
                                <div class="form-group{{ $errors->has('no_polisi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="no_polisi">{{ __('No Polisi') }}</label>
                                    <input type="text" name="no_polisi" id="no_polisi" class="form-control form-control-alternative{{ $errors->has('no_polisi') ? ' is-invalid' : '' }}" placeholder="{{ __('No Polisi') }}" value="{{ $truk->no_polisi }}" required autofocus>

                                    @if ($errors->has('no_polisi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('no_polisi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('nama_supir') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="nama_supir">{{ __('Nama Supir') }}</label>
                                    <input type="text" name="nama_supir" id="nama_supir" class="form-control form-control-alternative{{ $errors->has('nama_supir') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Supir') }}" value="{{ $truk->nama_supir }}" required>

                                    @if ($errors->has('nama_supir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_supir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi Perusahaan') }}</h6>
                                <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="nama_perusahaan">{{ __('Nama Perusahaan') }}</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-alternative{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Perusahaan') }}" value="{{ $truk->nama_perusahaan }}" required>

                                    @if ($errors->has('nama_perusahaan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('bidang_perusahaan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="bidang_perusahaan">{{ __('Bidang Perusahaan') }}</label>
                                    <input type="text" name="bidang_perusahaan" id="bidang_perusahaan" class="form-control form-control-alternative{{ $errors->has('bidang_perusahaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Bidang Perusahaan') }}" value="{{ $truk->bidang_perusahaan }}" required>

                                    @if ($errors->has('bidang_perusahaan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bidang_perusahaan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi Label BlueSmart') }}</h6>
                                <div class="form-group{{ $errors->has('uuid') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="uuid">{{ __('UUID') }}</label>
                                    <input type="text" name="uuid" id="uuid" class="form-control form-control-alternative{{ $errors->has('uuid') ? ' is-invalid' : '' }}" placeholder="{{ __('UUID') }}" value="{{ $truk->uuid }}" required>

                                    @if ($errors->has('uuid'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('uuid') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('major') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="major">{{ __('Major') }}</label>
                                    <input type="text" name="major" id="major" class="form-control form-control-alternative{{ $errors->has('major') ? ' is-invalid' : '' }}" placeholder="{{ __('Major') }}" value="{{ $truk->major }}" required>

                                    @if ($errors->has('major'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('major') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('minor') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="minor">{{ __('Minor') }}</label>
                                    <input type="text" name="minor" id="minor" class="form-control form-control-alternative{{ $errors->has('minor') ? ' is-invalid' : '' }}" placeholder="{{ __('Minor') }}" value="{{ $truk->minor }}" required>

                                    @if ($errors->has('minor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('minor') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('is_auth') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="is_auth">{{ __('Authorized') }}</label>
                                    <select class="form-control form-control-alternative{{ $errors->has('is_auth') ? ' is-invalid' : '' }}" name="is_auth" id="is_auth" required>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    @if ($errors->has('is_auth'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('is_auth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection