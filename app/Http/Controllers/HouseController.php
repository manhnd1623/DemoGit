<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    const PATH_VIEW = 'houses.';
    const PATH_UPLOAD = 'houses';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = House::query()->latest()->paginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =\request()->except('img');

        if (\request()->hasFile('img')){
            $data['img'] = Storage::put(self::PATH_UPLOAD, \request()->file('img'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('house'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('house'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        //
    }
}
