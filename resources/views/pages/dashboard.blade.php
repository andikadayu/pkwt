@extends('master')
@section('title-navbar','Dashboard')
@section('title','DASHBOARD')
@section('active-dashboard','active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">All</p>
                    <h3 class="card-title">
                        {{$all}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>Total Seluruh Karyawan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">Kontrak</p>
                    <h3 class="card-title">
                        {{$kontrak}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>Total Karyawan Kontrak
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">Kontrak yang akan Habis</p>
                    <h3 class="card-title">
                        {{$habis}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>Total Karyawan Kontrak yang habis bulan ini
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="card ">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-title">
                        <h4>Karyawan Kontrak yang akan Habis Bulan ini</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>KTP</th>
                                    <th>NPWP</th>
                                    <th>Tgl Habis</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach($data as $dr)
								<tr>
									<td></td>
									<td>{{$dr->nama}}</td>
									<td>{{$dr->ktp}}</td>
									<td>{{$dr->npwp}}</td>
									<td>{{$dr->durasi}}</td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
