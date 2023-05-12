<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Not Found');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'studi' => 'required',
                'fakultas' => 'required',
                'ttl' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'studi' => $request->studi,
                'fakultas' => $request->fakultas,
                'ttl' => $request->ttl,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

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
        $data = Mahasiswa::where('id', '=', $id)->get();

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
        try {
            $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'studi' => 'required',
                'fakultas' => 'required',
                'ttl' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $mahasiswa = Mahasiswa::findOrFail($id);

            $mahasiswa->update([
                'id' => $request->id,
                'nama' => $request->nama,
                'studi' => $request->studi,
                'fakultas' => $request->fakultas,
                'ttl' => $request->ttl,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Bad Request');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Bad Request');
        }
    }

    public function destroy(string $id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $data = $mahasiswa->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success');
            } else {
                return ApiFormatter::createApi(400, 'Bad Request');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Bad Request');
        }
    }
}
