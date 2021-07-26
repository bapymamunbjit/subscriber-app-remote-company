<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = Key::all();
        //dd($keys);
        return view('apikey.index',compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apikey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:keys|max:32'
        ]);

        Key::create($request->all());
     
        return redirect()->route('key.index')->with('success','Key created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\APIKey  $aPIKey
     * @return \Illuminate\Http\Response
     */
    public function show(APIKey $aPIKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Key $key)
    {
        return view('apikey.edit',compact('key'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Key $key)
    {
        $request->validate([
            'key' => 'required|unique:keys|max:32'
        ]);
    
        $key->update($request->all());
    
        return redirect()->route('key.index')->with('success','Key updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(APIKey $aPIKey)
    {
        //
    }
}
