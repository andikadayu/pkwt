<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index() {
    	$kontrak = DB::table('tb_detail_karyawan')
    	->where('status_karyawan', '=', 'Kontrak')
    	->count();
    	$all = DB::table('tb_detail_karyawan')
		->count();
		$habis= DB::table('tb_detail_karyawan')
			->whereMonth('durasi','=',date('m'))
			->whereYear('durasi','=',date('Y'))
			->count();
		$data=DB::table('tb_detail_karyawan')
			->join('tb_karyawan','tb_karyawan.id_karyawan','=','tb_detail_karyawan.id_karyawan')
			->whereMonth('durasi','=',date('m'))
			->whereYear('durasi','=',date('Y'))
			->get();
        return view('pages.dashboard', [
			'kontrak' => $kontrak,
			'habis' =>  $habis,
			'all' => $all,
			'data' => $data
        ]);
    }
}
