<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MasterUserController extends Controller
{
    public function index()
    {
        $data=DB::table('tb_user')
            ->get();
        return view('pages.m_users',[
            'show' => $data
        ]);
    }

    public function add_user(Request $request)
    {
        $insert=DB::table('tb_user')
            ->insert([
                'nama_user' => $request->input('nama_user'),
                'alamat_user' => $request->input('alamat_user'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'role' => $request->input('role')
            ]);
        if ($insert) {
            return 'sukses';
        }else{
            return 'error';
        }
    }

    public function get_user(Request $request)
    {
        $data=DB::table('tb_user')
            ->where('id',$request->get('id'))
            ->get();
        return $data;
    }

    public function update_user(Request $request)
    {
        $update=DB::table('tb_user')
            ->where('id',$request->input('id'))
            ->update([
                'nama_user' => $request->input('nama_user'),
                'alamat_user' => $request->input('alamat_user'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'role' => $request->input('role')
            ]);
        if ($update) {
            return 'sukses';
        }else{
            return 'error';
        }
    }

    public function delete_user(Request $request)
    {
        $delete=DB::table('tb_user')
            ->where('id',$request->get('id'))
            ->delete();
        if ($delete < 0) {
            return 'error';
        }else{
            return 'sukses';
        }
    }
}
