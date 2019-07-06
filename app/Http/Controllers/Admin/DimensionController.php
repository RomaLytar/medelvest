<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDimension;
use App\Http\Requests\StoreFacade;
use App\Model\Dimension;
use App\Model\Slidingdoors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensions = Dimension::with('type')->latest()->paginate(10);
        return view('layouts.admin.dimension', compact('dimensions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names = Slidingdoors::pluck('title', 'id')->toArray();
        $dimensions = Dimension::all();
        return view('layouts.admin.create_dimension', compact('dimensions', 'names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDimension $request)
    {
        $data = $request->all();
        $dimension = [
            'width' => $data['width'],
            'height' => $data['height'],
            'depth' => $data['depth'],
            'type_id' => $data['type_id']
        ];

        Session::flash('message', 'Успешно добавлено');
        Dimension::create($dimension);
        return redirect()->route('dimension.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dimension = Dimension::find($id);
        $names = Slidingdoors::pluck('title', 'id')->toArray();
        if (empty($dimension)) {
            abort(404);
        }
        return view('layouts.admin.edit_dimension', compact('dimension', 'names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDimension $request, $id)
    {
        $data = $request->all();
        $dimension = Dimension::find($id);
        $dimension->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('dimension.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dimension = Dimension::find($id);
        $dimension->delete();
        return redirect()->route('dimension.index');
    }
}
