@extends('master')
@section('title-navbar','Cetak')
@section('title','CETAK')
@section('active-cetak','active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-title">
                      <h4>Cetak Perjanjian</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <table class="table table-hover table-striped" cellspacing="0" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $dt)
                                <tr>
                                    <td></td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->status_karyawan}}</td>
                                    <td class="td-actions text-right">
                                        <button class="btn btn-success btn-round" onclick="print_pdf({{$dt->id_detail_karyawan}})"> 
                                            <i class="material-icons">description</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function print_pdf(id) {
        Swal.showLoading();
        $.ajax({
            url:"{{route('cetak_pdf')}}",
            method:"GET",
            data:{id:id},
        }).done(function (data) {
            Swal.close();
            window.open('cetak-pdf?id='+id,'_blank');
        })
    }
</script>
@endsection