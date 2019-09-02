@extends('layouts.app', ['title' => __('Parkir Masuk')])

@section('content')
    
    <div class="header bg-gradient-blues pb-5 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--4">
        <div class="row">
            <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/boy.png" class="rounded-circle img-thumbnail">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-primary mr-4">{{ __('Parkir Masuk') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-2">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="h3">
                                {{ __('Petugas - ').auth()->user()->name }}
                            </div>
                            <div style="font-weight:700">
                                {{ __('GATE 1') }}
                            </div>
                            <h2 class="mt-4">
                                <div id="time"></div>
                            </h2>
                            {{-- <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div> --}}
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="heading-small text-muted mb-1">{{ __('CCTV DEPAN ') }}</h6>
                                    <img src="{{ asset('argon') }}/img/theme/no_img.jpg" class="img-thumbnail">
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="heading-small text-muted mb-1">{{ __('CCTV BELAKANG ') }}</h6>
                                    <img src="{{ asset('argon') }}/img/theme/no_img.jpg" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-2">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Detail Informasi') }}</h3>
                        </div>
                        <div class="alert alert-dismissible fade show mt-3" role="alert" style="display:none;" id="notif">
                            <span id="notif-text"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                       
                        <h6 class="heading-small text-muted mb-4">{{ __('Informasi Parkir') }}</h6>
                      
                        <div class="form-group{{ $errors->has('tgl_masuk') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="tgl_masuk">{{ __('Tanggal Masuk') }}</label>
                            <input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-alternative{{ $errors->has('tgl_masuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal Masuk') }}" value="" required autofocus>

                            @if ($errors->has('tgl_masuk'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_masuk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('jam_masuk') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="jam_masuk">{{ __('Jam Masuk') }}</label>
                            <input type="text" name="jam_masuk" id="jam_masuk" class="form-control form-control-alternative{{ $errors->has('jam_masuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Jam Masuk') }}" value="" required>

                            @if ($errors->has('jam_masuk'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jam_masuk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tarif_flat') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="tarif_flat">{{ __('Tarif Flat') }}</label>
                            <input type="text" name="tarif_flat" id="tarif_flat" class="form-control form-control-alternative{{ $errors->has('tarif_flat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarif Flat') }}" value="{{ __('Rp.4.000,-') }}" required>

                            @if ($errors->has('tarif_flat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tarif_flat') }}</strong>
                                </span>
                            @endif
                        </div>
           
    
                        <hr class="my-4" />

                        <div class="row">
                            <div class="col-lg-6">

                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi Kendaraan') }}</h6>
                                
                                <div class="form-group{{ $errors->has('nomor_polisi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="nomor_polisi">{{ __('Nomor Polisi') }}</label>
                                    <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control form-control-alternative{{ $errors->has('nomor_polisi') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Polisi') }}" value="" required>
                                    
                                    @if ($errors->has('nomor_polisi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nomor_polisi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('nama_supir') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="nama_supir">{{ __('Nama Supir') }}</label>
                                    <input type="text" name="nama_supir" id="nama_supir" class="form-control form-control-alternative{{ $errors->has('nama_supir') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Supir') }}" value="" required>
                                    
                                    @if ($errors->has('nama_supir'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_supir') }}</strong>
                                        </span>
                                    @endif
                                </div>  

                            </div>

                            <div class="col-lg-6">

                                <h6 class="heading-small text-muted mb-4">{{ __('Informasi Perusahaan') }}</h6>
    
                                <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="nama_perusahaan">{{ __('Nama Perusahaan') }}</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-alternative{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Perusahaan') }}" value="" required>
                                    
                                    @if ($errors->has('nama_perusahaan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('bidang_perusahaan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="bidang_perusahaan">{{ __('Bidang Perusahaan') }}</label>
                                    <input type="text" name="bidang_perusahaan" id="bidang_perusahaan" class="form-control form-control-alternative{{ $errors->has('bidang_perusahaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Bidang Perusahaan') }}" value="" required>
                                    
                                    @if ($errors->has('bidang_perusahaan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bidang_perusahaan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                            </div>
                        </div><!-- /row -->


                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
  

<script type="text/javascript">
 function time(){
                a = new Date();
                D1=a.getDay();
                D2=a.getDate();
                M=a.getMonth();        
                Y=a.getFullYear();
                h=a.getHours();
                m=a.getMinutes();
                s=a.getSeconds();
                if(h<10){h="0"+h;}
                if(m<10){m="0"+m;}
                if(s<10){s="0"+s;}
                var hari = Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
                var bulan = Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
               
                document.getElementById("time").innerHTML = hari[D1]+", "+D2+" "+bulan[M]+" "+Y+"<br />"+h+":"+m+":"+s;
}
  setInterval(time, 1000);
  
</script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script>
      Pusher.logToConsole = true;
        var pusher = new Pusher('04e2a9a55dbfdea0b9c5', {
        forceTLS: true,
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('blereceiver');
      
    channel.bind('BleEvent', function(data) {
//         
        if(data.type == 'masuk'){
            $('#tgl_masuk').val(data.data.tgl_masuk);
            $('#jam_masuk').val(data.data.jam_masuk);
            $('#nomor_polisi').val(data.data.no_polisi);
            $('#nama_perusahaan').val(data.data.nama_perusahaan);
            $('#nama_supir').val(data.data.nama_supir);
            $('#bidang_perusahaan').val(data.data.bidang_perusahaan);

            $('#notif').hide();
            $('#notif').removeClass('alert-danger');
            $('#notif').removeClass('alert-success');
            

            $('#notif').addClass(data.data.notif);
            $('#notif-text').html(data.data.notif_text);
            $('#notif').show();

        }

           
    });
</script>
@endsection