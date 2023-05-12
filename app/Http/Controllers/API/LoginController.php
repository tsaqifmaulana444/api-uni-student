<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\LoginMahasiswa;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index()
    {
        // $data = LoginMahasiswa::select('id', 'nama', 'email', 'password')->get();
        $data = LoginMahasiswa::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Not Found');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $login_mahasiswa = LoginMahasiswa::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $data = LoginMahasiswa::where('id', '=', $login_mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Bad Request');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Bad Request');
        }
    }

    public function show(string $id)
    {
        $data = LoginMahasiswa::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Bad Request');
        }
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function show_spec(string $nama)
    {
        $data = LoginMahasiswa::where('nama', '=', $nama)->get();

        if ($data->count() > 0) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Bad Request');
        }
    }
}
