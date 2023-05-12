<?php

namespace App\Http\Controllers\API;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index()
    {
        $data = Mahasiswa::select('id', 'nama', 'email', 'password')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Not Found');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
