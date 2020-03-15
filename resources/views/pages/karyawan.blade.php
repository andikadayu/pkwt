@extends('master')
@section('title-navbar','Karyawan')
@section('title','KARYAWAN')
@section('active-karyawan','active')
@section('content')
<div class="container-fluid">
	<div class="row">
		@if(session('role') == 'Administrator')
		<button class="btn btn-primary" onclick="form_add_karyawan()">Add Karyawan</button>
		<div class="col-lg-12" id="form_add_karyawan">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">
							person_add
						</i>
					</div>
					<div class="card-title">
						<h4>Tambah Karyawan</h4>
					</div>
				</div>
				<div class="card-body">
					<form id="save_karyawan" enctype="multipart/form-data" method="get/post"> 
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama Karyawan</label>
									<input type="text" id="nama" name="nama" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal Masuk</label>
									<input type="text" name="tgl" class="form-control datepicker" id="tgl" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="text" name="tgl_lahir" class="form-control datepicker" id="tgl_lahir" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" id="alamat_karyawan" name="alamat_karyawan" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nomor KTP</label>
									<input type="text" id="noktp" name="noktp" class="form-control" maxlength="18"  autocomplete="off" >
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nomor NPWP</label>
									<input type="text" id="nonpwp" name="nonpwp" class="form-control" maxlength="20" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div>
									<label for="gambar">Gambar KTP</label> <br>
									<input type="file" id="imgktp" name="imgktp" accept="image/*" onchange="loadFile(event)">
									<img id="output"/>
								</div>
							</div>
							<div class="col-lg-6">
								<div>
									<label for="gambar">Gambar NPWP</label> <br>
									<input type="file" id="imgnpwp" name="imgnpwp" accept="image/*" onchange="loadFiles(event)">
									<img id="outputs"/>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="button" onclick="save_data()" class="btn btn-success float-right">Tambah</button>
						<button type="reset" onclick="$('#form_add_karyawan').hide()" class="btn btn-warning">Cancel</button>
					</div>	
				</form>
			</div>
		</div>
		<div class="col-lg-12" id="form_update_karyawan">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">
							person_add
						</i>
					</div>
					<div class="card-title">
						<h4>Update Karyawan</h4>
					</div>
				</div>
				<div class="card-body">
					<form id="update_karyawan" enctype="multipart/form-data" method="get/post"> 
						<div class="row">
							<input type="hidden" name="id_karyawan" id="edit_id_karyawan">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama Karyawan</label>
									<input type="text" id="edit_nama" name="nama" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal Masuk</label>
									<input type="text" name="tgl" class="form-control datepicker" id="edit_tgl" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" id="edit_tempat_lahir" name="tempat_lahir" class="form-control" autocomplete="off">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="text" name="tgl_lahir" class="form-control datepicker" id="edit_tgl_lahir" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" id="edit_alamat_karyawan" name="alamat_karyawan" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nomor KTP</label>
									<input type="text" id="edit_noktp" name="noktp" class="form-control" maxlength="18"  autocomplete="off" >
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nomor NPWP</label>
									<input type="text" id="edit_nonpwp" name="nonpwp" class="form-control" maxlength="20" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div>
									<label for="gambar">Gambar KTP</label> <br>
									<input type="file" id="edit_imgktp" name="imgktp" accept="image/*" onchange="editloadFile(event)">
									<img id="edit_output"/>
								</div>
							</div>
							<div class="col-lg-6">
								<div>
									<label for="gambar">Gambar NPWP</label> <br>
									<input type="file" id="edit_imgnpwp" name="imgnpwp" accept="image/*" onchange="editloadFiles(event)">
									<img id="edit_outputs"/>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="button" onclick="update_data()" class="btn btn-success float-right">Update</button>
						<button type="reset" onclick="$('#form_update_karyawan').hide()" class="btn btn-warning">Cancel</button>
					</div>	
				</form>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">
							list_alt
						</i>
					</div>
					<div class="card-title">
						<h4>Daftar Karyawan</h4>
					</div>
				</div>
				<div class="card-body">
					<table id="datatables" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>NO. KTP</th>
								<th>NO. NPWP</th>
								<th>TGL. MASUK</th>
								<th>GAMBAR KTP</th>
								<th>GAMBAR NPWP</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $d)
							<tr>
								<td class="text-center"></td>
								<td>{{$d->nama}}</td>
								<td>{{$d->ktp}}</td>
								<td>{{$d->npwp}}</td>
								<td>{{\Carbon\Carbon::parse($d->tgl_masuk)->format('d M Y')}}</td>
								<td>
									<button type="button" rel="tooltip" class="btn btn-warning btn-sm btn-round" data-toggle="modal" data-target="#viewktp" data-original-title="Detail Gambar" title="Detail Gambar" onclick="view_ktp({{$d->id_karyawan}})">
										<i class="material-icons">visibility</i> Detail Gambar
									</button>
								</td>
								<td>
									<button type="button" rel="tooltip" class="btn btn-warning btn-sm btn-round" data-toggle="modal" data-target="#viewnpwp" data-original-title="Detail Gambar" title="Detail Gambar" onclick="view_npwp({{$d->id_karyawan}})">
										<i class="material-icons">visibility</i> Detail Gambar
									</button>
								</td>
								<td>
									<button type="button" title="Edit Data" rel="tooltip" class="btn btn-success btn-round btn-sm btn-just-icon" onclick="form_update_karyawan();get_karyawan({{$d->id_karyawan}})">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" title="Delete Data" rel="tooltip" class="btn btn-danger btn-round btn-sm btn-just-icon" onclick="delete_karyawan({{$d->id_karyawan}})">
										<i class="material-icons">delete</i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
		@if(session('role') == 'Direktur')
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">
							list_alt
						</i>
					</div>
					<div class="card-title">
						<h4>Daftar Karyawan</h4>
					</div>
				</div>
				<div class="card-body">
					<table id="datatables_1" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>DURASI</th>
								<th>GAJI / THP</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail as $dt)
							<tr>
								<td class="text-center"></td>
								<td>{{$dt->nama}}</td>
								<td>@if($dt->durasi != ''){{\Carbon\Carbon::parse($dt->durasi)->format('d M Y') }}@endif</td>
								<td id='rupiah'>{{$dt->gaji_thp}}</td>
								<td>{{$dt->status_karyawan}}</td>
								<td>
									<button type="button" title="Edit Data" rel="tooltip" class="btn btn-success btn-round btn-sm btn-just-icon" data-target="#modalDirektur" data-toggle="modal" onclick="get_direktur({{$dt->id_detail_karyawan}})">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" title="Delete Data" rel="tooltip" class="btn btn-danger btn-round btn-sm btn-just-icon"  onclick="reset_direktur({{$dt->id_detail_karyawan}})">
										<i class="material-icons">delete</i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
		@if(session('role') == 'HRD')
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">
							list_alt
						</i>
					</div>
					<div class="card-title">
						<h4>Daftar Karyawan</h4>
					</div>
				</div>
				<div class="card-body">
					<table id="datatables_2" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>GAJI / THP</th>
								<th>GAJI KOTOR</th>
								<th>GAJI YANG DIDAPATKAN</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail as $dt)
							<tr>
								<td class="text-center"></td>
								<td>{{$dt->nama}}</td>
								<td id="rupiah1">{{$dt->gaji_thp}}</td>
								<td id="rupiah2">{{$dt->gaji_kotor}}</td>
								<td id="rupiah3">{{$dt->total_gaji}}</td>
								<td>
									<button type="button" title="View Data" rel="tooltip" class="btn btn-info btn-round btn-sm btn-just-icon" data-toggle="modal" data-target="#viewdtkaryawan" onclick="view_dt_karyawan({{$dt->id_detail_karyawan}})">
										<i class="material-icons">visibility</i>
									</button>
									<button type="button" title="Edit Data" rel="tooltip" class="btn btn-success btn-round btn-sm btn-just-icon" data-toggle="modal" data-target="#modalHrd" onclick="get_hrd({{$dt->id_detail_karyawan}})">
										<i class="material-icons">edit</i>
									</button>
									<button type="button" title="Delete Data" rel="tooltip" class="btn btn-danger btn-round btn-sm btn-just-icon" onclick="reset_hrd({{$dt->id_detail_karyawan}})">
										<i class="material-icons">delete</i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<!-- Modal View Detail Gambar KTP -->
<div class="modal fade" id="viewktp" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Gambar KTP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<hr>
			</div>
			<div class="modal-body">
				<div id="view_ktp_load"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal View Detail Gambar NPWP -->
<div class="modal fade" id="viewnpwp" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Gambar NPWP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<hr>
			</div>
			<div class="modal-body">
				<div id="view_npwp_load"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Update Role Direktur -->
<div class="modal fade" id="modalDirektur" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-info text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>

                        <h4 class="card-title">Update Detail Karyawan</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" id="save_direktur">
                        <div class="card-body">
                            <input type="hidden" name="id_detail_karyawan" id="id_detail_karyawan_direktur">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">today</i></div>
                                    </div>
                                    <input name="durasi" id="durasi" type="text" class="form-control datepicker"
                                        placeholder="Durasi..." required="">
                                </div>
                            </div>
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="gaji_thp" id="gaji_thp" type="number" class="form-control"
                                        placeholder="Gaji / THP..." required="">
                                </div>
                            </div>
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">work</i></div>
                                    </div>
                                    <select name="status_karyawan" id="status_karyawan" class="selectpicker"
                                        data-style="btn btn-info" title="Status Karyawan">
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Freelance">Freelance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <a onclick="save_direktur()" class="btn btn-info btn-link btn-wd btn-lg">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Update Role HRD -->
<div class="modal fade" id="modalHrd" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-info text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>

                        <h4 class="card-title">Update Detail Karyawan</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" id="save_hrd">
                        <div class="card-body">
                            <input type="hidden" name="id_detail_karyawan" id="id_detail_karyawan_hrd">
                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="tunjangan_jabatan" id="tunjangan_jabatan" type="number" class="form-control"
                                        placeholder="Tunjangan Jabatan" required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="tunjangan_makan" id="tunjangan_makan" type="number" class="form-control"
                                        placeholder="Tunjangan Makan" required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="tunjangan_transport" id="tunjangan_transport" type="number" class="form-control"
                                        placeholder="Tunjangan Transport" required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="tunjangan_komunikasi" id="tunjangan_komunikasi" type="number" class="form-control"
                                        placeholder="Tunjangan Komunikasi" required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="tunjangan_domisili" id="tunjangan_domisili" type="number" class="form-control"
                                        placeholder="Tunjangan Domisili" required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="gaji_kotor" id="gaji_kotor" type="number" class="form-control"
                                        placeholder="Gaji Kotor........." required="">
                                </div>
							</div>
							<div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input name="total_gaji"id="total_gaji"type="number" class="form-control"
                                        placeholder="Gaji Yang Diterima...." required="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <a onclick="save_hrd()" class="btn btn-info btn-link btn-wd btn-lg">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal View Detail Karyawan -->
<div class="modal fade" id="viewdtkaryawan" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Karyawan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<hr>
			</div>
			<div class="modal-body">
				<div class="row table-responsive">
					<table class="table table-borderless table-sm">
						<tr>
							<td>Nama Karyawan</td>
							<td>:</td>
							<td id="dt_nama"></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>:</td>
							<td id="dt_status"></td>
						</tr>
						<tr>
							<td>No KTP</td>
							<td>:</td>
							<td id="dt_ktp"></td>
						</tr>
						<tr>
							<td>No NPWP</td>
							<td>:</td>
							<td id="dt_npwp"></td>
						</tr>
						<hr>
						<tr>
							<td>Gaji Pokok</td>
							<td>:</td>
							<td id="gaji_pokok"></td>
						</tr>
						<tr>
							<td>Tunjangan Jabatan</td>
							<td>:</td>
							<td id="t_jabatan"></td>
						</tr>
						<tr>
							<td>Tunjangan Makan</td>
							<td>:</td>
							<td id="t_makan"></td>
						</tr>
						<tr>
							<td>Tunjangan Transport</td>
							<td>:</td>
							<td id="t_transport"></td>
						</tr>
						<tr>
							<td>Tunjangan Komunikasi</td>
							<td>:</td>
							<td id="t_komunikasi"></td>
						</tr>
						<tr>
							<td>Tunjangan Domisili</td>
							<td>:</td>
							<td id="t_domisili"></td>
						</tr>
						<tr>
							<td>Gaji Kotor</td>
							<td>:</td>
							<td id="g_kotor"></td>
						</tr>
						<tr>
							<td>Total Gaji yang Didapat</td>
							<td>:</td>
							<td id="t_gaji"></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
$('#form_add_karyawan').hide();
$('#form_update_karyawan').hide();
function form_add_karyawan() {
	$('#form_add_karyawan').show();
	$('#form_update_karyawan').hide();
}
function form_update_karyawan() {
	$('#form_add_karyawan').hide();
	$('#form_update_karyawan').show();
}
</script>
<script>
	var loadFile = function(event) {
		document.getElementById('output').style.display = "block";
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	var loadFiles = function(event) {
		document.getElementById('outputs').style.display = "block";
		var outputs = document.getElementById('outputs');
		outputs.src = URL.createObjectURL(event.target.files[0]);
	};

	var editloadFile = function(event) {
		document.getElementById('edit_output').style.display = "block";
		var output = document.getElementById('edit_output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	var editloadFiles = function(event) {
		document.getElementById('edit_outputs').style.display = "block";
		var outputs = document.getElementById('edit_outputs');
		outputs.src = URL.createObjectURL(event.target.files[0]);
	};

	function save_data() {
		Swal.showLoading();
		var nama = $('#nama').val();
		var noktp = $('#noktp').val();
		var nonpwp = $('#nonpwp').val();
		var tgl = $('#tgl').val();
		var imgktp = $('#imgktp').val();
		var imgnpwp = $('#imgnpwp').val();
		var tgl_lahir = $('#tgl_lahir').val();
		var tempat_lahir= $('#tempat_lahir').val();
		var alamat_user=$('#alamat_user').val();

		if (nama == "" || noktp == "" || nonpwp == "" || tgl == "" || imgktp == "" || imgnpwp == "" || tempat_lahir == "" || tgl_lahir == "" || alamat_user == "") {
			swal({
				type: 'warning',
				title: 'Oops...',
				text: 'Form tidak boleh ada yang kosong'
			});
		} else {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('add_karyawan')}}",
				processData: false,
				contentType : false,
				data: new FormData($('#save_karyawan')[0]),
				type: 'post',
				success: function (result) {  
					Swal.close();  
					if (result == 'sukses') {
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Data Karyawan Berhasil ditambahkan',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}else{
						Swal.fire({
							position: 'top-end',
							type: 'error',
							title: 'Data Karyawan Gagal ditambahkan',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}
				},
				error : function (data) {
					$.notify(data, "error");
				}
			})
		}
	}

	function view_ktp(id) {
		Swal.showLoading();
		$.ajax({
			url:"{{route('view_ktp_load')}}",
			method:'GET',
			data:{id:id},
		}).done(function (data) {
			Swal.close();
			$('#view_ktp_load').html(data);
		})
	}

	function view_npwp(id) {
		Swal.showLoading();
		$.ajax({
			url:"{{route('view_npwp_load')}}",
			method:'GET',
			data:{id:id},
		}).done(function (data) {
			Swal.close();
			$('#view_npwp_load').html(data);
		})
	}

	function delete_karyawan(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: 'You will Deleted!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, keep it',
			confirmButtonClass: "btn btn-success",
			cancelButtonClass: "btn btn-danger",
			buttonsStyling: false
		}).then((result) => {
			if (result.value) {
				Swal.showLoading();
				$.ajax({
					url: "{{route('delete_karyawan')}}",
					method : 'get',
					data : {id:id}	
				}).done(function (data) {
					Swal.close();
					if (data == 'success') {
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Data Karyawan Berhasil dihapus',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}else{
						Swal.fire(
							'Failed',
							'Your imaginary file is safe :)',
							'error'
						)
					}
				})

			}else{
				Swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
				)
			}
		});
	}

	function get_karyawan(id) {
		$.ajax({
			url:"{{route('get_karyawan')}}",
			method:"GET",
			data:{id:id},
		}).done(function (data) {
			document.getElementById('edit_output').src="public/foto_ktp/"+data[0].img_ktp;
			document.getElementById('edit_outputs').src="public/foto_npwp/"+data[0].img_npwp;
			$('#edit_id_karyawan').val(data[0].id_karyawan),
			$('#edit_nama').val(data[0].nama),
			$('#edit_tgl').val(data[0].tgl_masuk),
			$('#edit_tgl_lahir').val(data[0].tgl_lahir),
			$('#edit_alamat_karyawan').val(data[0].alamat_karyawan),
			$('#edit_tempat_lahir').val(data[0].tempat_lahir),
			$('#edit_noktp').val(data[0].ktp),
			$('#edit_nonpwp').val(data[0].npwp)
		})
	}

	function update_data() {
		Swal.showLoading();
		var nama = $('#edit_nama').val();
		var noktp = $('#edit_noktp').val();
		var nonpwp = $('#edit_nonpwp').val();
		var tgl = $('#edit_tgl').val();
		var tgl_lahir = $('#edit_tgl_lahir').val();
		var tempat_lahir= $('#edit_tempat_lahir').val();
		var alamat_user=$('#edit_alamat_user').val();
		if (nama == "" || noktp == "" || nonpwp == "" || tgl == "" || tempat_lahir == "" || tgl_lahir == "" || alamat_user == "") {
			swal({
				type: 'warning',
				title: 'Oops...',
				text: 'Form tidak boleh ada yang kosong'
			});
		} else {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('update_karyawan')}}",
				processData: false,
				contentType : false,
				data: new FormData($('#update_karyawan')[0]),
				type: 'post',
				success: function (result) {  
					Swal.close();  
					if (result == 'sukses') {
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Data Karyawan Berhasil diupdate',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}else{
						Swal.fire({
							position: 'top-end',
							type: 'error',
							title: 'Data Karyawan Gagal diupdate',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}
				},
				error : function (data) {
					$.notify(data, "error");
				}
			})
		}
	}

	function get_direktur(id) {
		Swal.showLoading();
		$.ajax({
			url:"{{route('get_direktur')}}",
			method:"GET",
			data:{id:id},
		}).done(function (data) {
			Swal.close();
			$('#id_detail_karyawan_direktur').val(data[0].id_detail_karyawan),
			$('#durasi').val(data[0].durasi),
			$('#gaji_thp').val(data[0].gaji_thp),
			$('#status_karyawan').selectpicker('val',data[0].status_karyawan)
		})
	}

	function save_direktur() {
		Swal.showLoading();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('save_direktur')}}",
			processData: false,
			contentType : false,
			data: new FormData($('#save_direktur')[0]),
			type: 'post',
			success: function (result) {  
				Swal.close();  
				if (result == 'sukses') {
					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Detail Karyawan Berhasil di Update',
						showConfirmButton: true
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}else{
					Swal.fire({
						position: 'top-end',
						type: 'error',
						title: 'Detail Karyawan Gagal di Update',
						showConfirmButton: true
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}
			},
			error : function (data) {
				$.notify(data, "error");
			}
		})
	}

	function reset_direktur(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: 'You will Deleted!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, keep it',
			confirmButtonClass: "btn btn-success",
			cancelButtonClass: "btn btn-danger",
			buttonsStyling: false
		}).then((result) => {
			if (result.value) {
				Swal.showLoading();
				$.ajax({
					url: "{{route('reset_direktur')}}",
					method : 'get',
					data : {id:id}	
				}).done(function (data) {
					Swal.close();
					if (data == 'success') {
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Data Karyawan Berhasil dihapus',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}else{
						Swal.fire(
							'Failed',
							'Your imaginary file is safe :)',
							'error'
						)
					}
				})

			}else{
				Swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
				)
			}
		});
	}

	function get_hrd(id) {
		Swal.showLoading();
		$.ajax({
			url:"{{route('get_hrd')}}",
			method:"GET",
			data:{id:id},
		}).done(function (data) {
			Swal.close();
			$('#id_detail_karyawan_hrd').val(data[0].id_detail_karyawan),
			$('#tunjangan_jabatan').val(data[0].tunjangan_jabatan),
			$('#tunjangan_makan').val(data[0].tunjangan_makan),
			$('#tunjangan_transport').val(data[0].tunjangan_transport),
			$('#tunjangan_komunikasi').val(data[0].tunjangan_komunikasi),
			$('#tunjangan_domisili').val(data[0].tunjangan_domisili)
		})
	}

	function save_hrd() {
		Swal.showLoading();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('save_hrd')}}",
			processData: false,
			contentType : false,
			data: new FormData($('#save_hrd')[0]),
			type: 'post',
			success: function (result) {  
				Swal.close();  
				if (result == 'sukses') {
					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Detail Karyawan Berhasil di Update',
						showConfirmButton: true
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}else{
					Swal.fire({
						position: 'top-end',
						type: 'error',
						title: 'Detail Karyawan Gagal di Update',
						showConfirmButton: true
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}
			},
			error : function (data) {
				$.notify(data, "error");
			}
		})
	}

	function reset_hrd(id) {
		Swal.fire({
			title: 'Are you sure?',
			text: 'You will Deleted!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, keep it',
			confirmButtonClass: "btn btn-success",
			cancelButtonClass: "btn btn-danger",
			buttonsStyling: false
		}).then((result) => {
			if (result.value) {
				Swal.showLoading();
				$.ajax({
					url: "{{route('reset_hrd')}}",
					method : 'get',
					data : {id:id}	
				}).done(function (data) {
					Swal.close();
					if (data == 'success') {
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Data Karyawan Berhasil dihapus',
							showConfirmButton: true
						}).then((result) => {
							if (result.value) {
								location.reload();
							}
						});
					}else{
						Swal.fire(
							'Failed',
							'Your imaginary file is safe :)',
							'error'
						)
					}
				})

			}else{
				Swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
				)
			}
		});
	}

	function view_dt_karyawan(id) {
		Swal.showLoading();
		$.ajax({
			url:"{{route('view_dt_karyawan')}}",
			method:"GET",
			data:{id:id},
		}).done(function (data) {
			Swal.close();
			$('#dt_nama').text(data[0].nama),
			$('#dt_status').text(data[0].status_karyawan),
			$('#dt_ktp').text(data[0].ktp),
			$('#dt_npwp').text(data[0].npwp),
			$('#gaji_pokok').text(data[0].gaji_thp),
			$('#t_jabatan').text(data[0].tunjangan_jabatan),
			$('#t_makan').text(data[0].tunjangan_makan),
			$('#t_transport').text(data[0].tunjangan_transport),
			$('#t_komunikasi').text(data[0].tunjangan_komunikasi),
			$('#t_domisili').text(data[0].tunjangan_domisili),
			$('#g_kotor').text(data[0].gaji_kotor),
			$('#t_gaji').text(data[0].total_gaji)
			refresh_rupiah();
		})
	}
</script>
<script>
	// Source Code Rupiah Format : https://jagowebdev.com/format-rupiah-dengan-javascript/ 
	var bilangan = $('#rupiah').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang(rupiah);
	function format_uang(uang) {
		$('#rupiah').text("Rp."+uang);
	}
// pembatas
	var bilangan = $('#rupiah1').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang1(rupiah);
	function format_uang1(uang) {
		$('#rupiah1').text("Rp."+uang);
	}
// Pembatas


var bilangan = $('#rupiah2').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang8(rupiah);
	function format_uang8(uang) {
		$('#rupiah2').text("Rp."+uang);
	}

	var bilangan = $('#rupiah3').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang9(rupiah);
	function format_uang9(uang) {
		$('#rupiah3').text("Rp."+uang);
	}

function refresh_rupiah() {
	var bilangan = $('#gaji_pokok').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang2(rupiah);
	function format_uang2(uang) {
		$('#gaji_pokok').text("Rp."+uang);
	}
var bilangan = $('#t_jabatan').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang3(rupiah);
	function format_uang3(uang) {
		$('#t_jabatan').text("Rp."+uang);
	}
	var bilangan = $('#t_makan').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang10(rupiah);
	function format_uang10(uang) {
		$('#t_makan').text("Rp."+uang);
	}
// Pembatas
	var bilangan = $('#t_transport').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang4(rupiah);
	function format_uang4(uang) {
		$('#t_transport').text("Rp."+uang);
	}
// Pembatas
var bilangan = $('#t_komunikasi').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang5(rupiah);
	function format_uang5(uang) {
		$('#t_komunikasi').text("Rp."+uang);
	}
	// Pembatas
	var bilangan = $('#t_domisli').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
	
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang6(rupiah);
	function format_uang6(uang) {
		$('#t_domisli').text("Rp."+uang);
	}
// Pembatas
var bilangan = $('#gaji_total').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang7(rupiah);
	function format_uang7(uang) {
		$('#gaji_total').text("Rp."+uang);
	}

	var bilangan = $('#t_domisili').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang11(rupiah);
	function format_uang11(uang) {
		$('#t_domisili').text("Rp."+uang);
	}

	var bilangan = $('#g_kotor').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang12(rupiah);
	function format_uang12(uang) {
		$('#g_kotor').text("Rp."+uang);
	}

	var bilangan = $('#t_gaji').text();
	var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	format_uang13(rupiah);
	function format_uang13(uang) {
		$('#t_gaji').text("Rp."+uang);
	}
}
</script>
@endsection		