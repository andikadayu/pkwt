<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Session;
use \Carbon\Carbon;

class KaryawanController extends Controller
{
	public function index() {
		$data = DB::table('tb_karyawan')->get();

		$detail = DB::table('tb_detail_karyawan')
			->join('tb_karyawan','tb_detail_karyawan.id_karyawan','=','tb_karyawan.id_karyawan')
			->get();
		return view('pages.karyawan', [
			'data' => $data,
			'detail' => $detail
		]);
	}

	public function add_karyawan(Request $request)
	{
		$this->validate($request, [
			'imgktp' => 'required',
			'imgnpwp' => 'required',
		]);
		$filektp = $request->file('imgktp');
		$filenpwp = $request->file('imgnpwp');
		$folderktp = public_path('foto_ktp');
		$foldernpwp = public_path('foto_npwp');
		$tgl = $request->input('tgl');
		
		$filektp->move($folderktp,$filektp->getClientOriginalName());
		$filenpwp->move($foldernpwp,$filenpwp->getClientOriginalName());

		$insert=DB::table('tb_karyawan')
		->insertGetId([
			'nama' => $request->input('nama'),
			'alamat_karyawan' => $request->input('alamat_karyawan'),
			'ktp' => $request->input('noktp'),
			'npwp' => $request->input('nonpwp'),
			'img_ktp' => $filektp->getClientOriginalName(),
			'img_npwp' => $filenpwp->getClientOriginalName(),
			'tgl_masuk' => $tgl,
			'tgl_lahir' => $request->input('tgl_lahir'),
			'tempat_lahir' => $request->input('tempat_lahir')
		]);

		$insert_a=DB::table('tb_detail_karyawan')
			->insert([
				'id_karyawan' => $insert
			]);

		if ($insert) {
			return 'sukses';
		}else{
			return 'error';
		}
	}

	public function view_ktp_load(Request $request)
	{
		$data=DB::table('tb_karyawan')
			->where('id_karyawan',$request->get('id'))
			->first();
		$url=url('public/foto_ktp/'.$data->img_ktp);

		echo "<img src='$url' class='rounded mx-auto d-block img-fluid'>";
	}

	public function view_npwp_load(Request $request)
	{
		$data=DB::table('tb_karyawan')
			->where('id_karyawan',$request->get('id'))
			->first();
		$url=url('public/foto_npwp/'.$data->img_npwp);

		echo "<img src='$url' class='rounded mx-auto d-block img-fluid'>";
	}

	public function delete_karyawan(Request $request)
	{
		$ceks=DB::table('tb_karyawan')->where('id_karyawan',$request->get('id'))->first();
		File::delete(public_path('foto_ktp/'.$ceks->img_ktp));
		File::delete(public_path('foto_npwp/'.$ceks->img_npwp));
		$delete=DB::table('tb_karyawan')
			->where('id_karyawan',$request->get('id'))
			->delete();
		if($delete < 0){
			return 'error';
		}else{
			return 'success';
		}
	}

	public function get_karyawan(Request $request)
	{
		$data=DB::table('tb_karyawan')
			->where('id_karyawan',$request->get('id'))
			->get();
		return $data;
	}

	public function update_karyawan(Request $request)
	{
		$ceks=DB::table('tb_karyawan')->where('id_karyawan',$request->input('id_karyawan'))->first();
		if ($request->input('imgktp') != "" || $request->input('imgnpwp') != "") {
			if($request->input('imgktp') != ""){
				File::delete(public_path('foto_ktp/'.$ceks->img_ktp));

				$filektp = $request->file('imgktp');
				$filektp->move(public_path('foto_ktp'),$filektp->getClientOriginalName());

				$update=DB::table('tb_karyawan')
					->where('id_karyawan',$request->input('id_karyawan'))
					->update([
						'nama' => $request->input('nama'),
						'ktp' => $request->input('noktp'),
						'alamat_karyawan' => $request->input('alamat_karyawan'),
						'npwp' => $request->input('nonpwp'),
						'img_ktp' => $filektp->getClientOriginalName(),
						'tgl_masuk' => $request->input('tgl'),
						'tgl_lahir' => $request->input('tgl_lahir'),
						'tempat_lahir' => $request->input('tempat_lahir')
					]);
			}else if($request->input('imgnpwp') != ""){
				File::delete(public_path('foto_npwp/'.$ceks->img_npwp));

				$filenpwp = $request->file('imgnpwp');
				$filenpwp->move(public_path('foto_npwp'),$filenpwp->getClientOriginalName());

				$update=DB::table('tb_karyawan')
					->where('id_karyawan',$request->input('id_karyawan'))
					->update([
						'nama' => $request->input('nama'),
						'ktp' => $request->input('noktp'),
						'npwp' => $request->input('nonpwp'),
						'alamat_karyawan' => $request->input('alamat_karyawan'),
						'img_npwp' => $filenpwp->getClientOriginalName(),
						'tgl_masuk' => $request->input('tgl'),
						'tgl_lahir' => $request->input('tgl_lahir'),
						'tempat_lahir' => $request->input('tempat_lahir')
					]);
			}else{
				File::delete(public_path('foto_ktp/'.$ceks->img_ktp));
				File::delete(public_path('foto_npwp/'.$ceks->img_npwp));

				$filektp = $request->file('imgktp');
				$filenpwp = $request->file('imgnpwp');

				$filektp->move(public_path('foto_ktp'),$filektp->getClientOriginalName());
				$filenpwp->move(public_path('foto_npwp'),$filenpwp->getClientOriginalName());

				$update=DB::table('tb_karyawan')
					->where('id_karyawan',$request->input('id_karyawan'))
					->update([
						'nama' => $request->input('nama'),
						'ktp' => $request->input('noktp'),
						'alamat_karyawan' => $request->input('alamat_karyawan'),
						'npwp' => $request->input('nonpwp'),
						'img_ktp' => $filektp->getClientOriginalName(),
						'img_npwp' => $filenpwp->getClientOriginalName(),
						'tgl_masuk' => $request->input('tgl'),
						'tgl_lahir' => $request->input('tgl_lahir'),
						'tempat_lahir' => $request->input('tempat_lahir')
					]);
			}
		} else {
			$update=DB::table('tb_karyawan')
				->where('id_karyawan',$request->input('id_karyawan'))
				->update([
					'nama' => $request->input('nama'),
					'ktp' => $request->input('noktp'),
					'alamat_karyawan' => $request->input('alamat_karyawan'),
					'npwp' => $request->input('nonpwp'),
					'tgl_masuk' => $request->input('tgl'),
					'tgl_lahir' => $request->input('tgl_lahir'),
					'tempat_lahir' => $request->input('tempat_lahir')
				]);
		}

		if ($update) {
			return "sukses";
		} else {
			return "error";
		}
	}

	public function get_direktur(Request $request)
	{
		$data=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->get('id'))
			->get();
		return $data;
	}

	public function save_direktur(Request $request)
	{
		$time=\Carbon\Carbon::now()->format('y-m-d h:i:s');
		$updates=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->input('id_detail_karyawan'))
			->update([
				'durasi' => $request->input('durasi'),
				'gaji_thp' => $request->input('gaji_thp'),
				'status_karyawan' => $request->input('status_karyawan'),
				'direktur_update_by' => Session::get('id'),
				'direktur_update_at' => $time
			]);
		if ($updates) {
			return "sukses";
		} else {
			return "error";
		}
	}

	public function reset_direktur(Request $request)
	{
		$reset=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->get('id'))
			->update([
				'durasi' => null,
				'gaji_thp' => null,
				'status_karyawan' => null,
				'direktur_update_by' => null,
				'direktur_update_at' => null
			]);
		if($reset){
			return "success";
		}else{
			return "error";
		}
	}

	public function get_hrd(Request $request)
	{
		$data=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->get('id'))
			->get();
		return $data;
	}

	public function save_hrd(Request $request)
	{
		$time=\Carbon\Carbon::now()->format('y-m-d h:i:s');
		$updates=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->input('id_detail_karyawan'))
			->update([
				'tunjangan_jabatan'=>$request->input('tunjangan_jabatan'),
				'tunjangan_makan'=>$request->input('tunjangan_makan'),
				'tunjangan_transport'=>$request->input('tunjangan_transport'),
				'tunjangan_komunikasi'=>$request->input('tunjangan_komunikasi'),
				'tunjangan_domisili'=>$request->input('tunjangan_domisili'),
				'gaji_kotor' => $request->input('gaji_kotor'),
				'total_gaji' => $request->input('total_gaji'),
				'hrd_update_by' => Session::get('id'),
				'hrd_update_at' => $time
			]);
		if($updates){
			return 'sukses';
		}else{
			return 'error';
		}
	}

	public function reset_hrd(Request $request)
	{
		$updates=DB::table('tb_detail_karyawan')
			->where('id_detail_karyawan',$request->get('id'))
			->update([
				'tunjangan_jabatan'=>null,
				'tunjangan_makan'=>null,
				'tunjangan_transport'=>null,
				'tunjangan_komunikasi'=>null,
				'tunjangan_domisili'=>null,
				'gaji_kotor' => null,
				'total_gaji' => null,
				'hrd_update_by' => null,
				'hrd_update_at' => null
			]);
		if($updates){
			return 'success';
		}else{
			return 'error';
		}
	}

	public function view_dt_karyawan(Request $request)
	{
		$data=DB::table('tb_detail_karyawan')
			->join('tb_karyawan','tb_karyawan.id_karyawan','=','tb_detail_karyawan.id_karyawan')
			->where('id_detail_karyawan',$request->get('id'))
			->get();
		return $data;
	}

	public function view_gambar_load(Request $request)
	{
		$data=DB::table('tb_karyawan')
			->where('id_karyawan',$request->get('id'))
			->first();
		$url=url('public/foto_ktp/'.$data->img_ktp);
		$urls=url('public/foto_npwp/'.$data->img_npwp);

		echo "
		<h3 class='text-center'>Foto KTP</h3>
		<img src='$url' class='rounded mx-auto d-block img-fluid'>
		<h3 class='text-center'>Foto NPWP</h3>
		<img src='$urls' class='rounded mx-auto d-block img-fluid'>";
	}
}
