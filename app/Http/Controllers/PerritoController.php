<?php

namespace App\Http\Controllers;

use App\Models\Perrito;
use Illuminate\Http\Request;
use App\Http\Requests\PerritoRequest;


class PerritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Perrito::orderBy('id', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerritoRequest $request)
    {

        $perrito = new Perrito;
        $perrito->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function show(Perrito $perrito)
    {
        return $perrito;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function update(PerritoRequest $request, Perrito $perrito)
    {

        $perrito->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perrito  $perrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perrito $perrito)
    {
        $perrito->delete();
    }
}
