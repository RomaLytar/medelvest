<?php

namespace App\Http\Controllers\Admin;

use App\Model\Configuration;
use App\Model\Facade;
use\App\Http\Requests\StoreFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FacadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facades = Facade::with('configuration')->latest()->paginate(10);
        return view('layouts.admin.facade', compact('facades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names = Configuration::pluck('title', 'id')->toArray();
        $facade = Facade::all();
        return view('layouts.admin.create_facade', compact('facade' , 'names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacade $request)
    {
        $data = $request->all();
        $facade = [
            'title' => $data['title'],
            'price' => $data['price'],
            'type' =>  $data['type'],
            'configuration_id' => $data['configuration_id'],
        ];
        Session::flash('message', 'Успешно добавлено');
        Facade::create($facade);
        return redirect()->route('facade.index');
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
        $facade = Facade::find($id);
        $names = Configuration::pluck('title', 'id')->toArray();
        if (empty($facade)) {
            abort(404);
        }
        return view('layouts.admin.edit_facade', compact('facade','names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFacade $request, $id)
    {
        $data = $request->all();
        $facade = Facade::find($id);
        $facade->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('facade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facade = Facade::find($id);
        $facade->delete();
        return redirect()->route('facade.index');
    }
}
