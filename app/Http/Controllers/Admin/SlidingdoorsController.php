<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slidingdoors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlidingdoorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidingdoors = Slidingdoors::latest()->paginate(10);
        return view('layouts.admin.slidingdoors', compact('slidingdoors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slidingdoors = Slidingdoors::all();
        return view('layouts.admin.create_slidingdoor', compact('slidingdoors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $slidingdoors = [
            'title' => $data['title'],
        ];

        Session::flash('message', 'Успешно добавлено');
        Slidingdoors::create($slidingdoors);
        return redirect()->route('slidingdoors.index');
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
        $slidingdoors = Slidingdoors::find($id);
        if (empty($slidingdoors)) {
            abort(404);
        }
        return view('layouts.admin.edit_slidingdoor', compact('slidingdoors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $slidingdoors = Slidingdoors::find($id);
        $slidingdoors->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('slidingdoors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slidingdoors = Slidingdoors::find($id);
        $slidingdoors->delete();
        return redirect()->route('slidingdoors.index');
    }
}
