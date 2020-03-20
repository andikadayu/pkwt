<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class CetakController extends Controller
{
    public function index()
    {
        $data=DB::table('tb_detail_karyawan')
            ->join('tb_karyawan','tb_karyawan.id_karyawan','=','tb_detail_karyawan.id_karyawan')
            ->whereNotNull(['gaji_thp','gaji_kotor','total_gaji'])
            ->get();
        return view('pages.hal_cetak',[
            'data' => $data
        ]);
    }

    public function cetak_pdf(Request $request)
    {
        $data=DB::table('tb_detail_karyawan')
            ->join('tb_karyawan','tb_karyawan.id_karyawan','=','tb_detail_karyawan.id_karyawan')
            ->join('tb_user','tb_user.id','=','tb_detail_karyawan.hrd_update_by')
            ->where('id_detail_karyawan',$request->get('id'))
            ->get();
        $pdf=PDF::loadView('component.surat_perjanjian',[
            'data' => $data
        ]);
        return $pdf->stream('surat-perjanjian'.date('m-d-Y').'.pdf');
    }
}
