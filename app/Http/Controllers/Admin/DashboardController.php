<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Configuration;
use App\Http\Requests\StoreConfiguration;
use App\Model\Color;
use Spatie\MediaLibrary\Models\Media;
use App\Model\Facade;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuration = Configuration::with('facades', 'colors', 'media')->latest()->paginate(10);
        return view('layouts.admin.dashboard', compact('configuration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuration = Configuration::all();
        return view('layouts.admin.create_config', compact('configuration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfiguration $request)
    {
        $data = $request->all();
        $configuration = [
            'title' => $data['title'] ?: null
        ];
        $ids =  Configuration::create($configuration)->id;
        $media = Configuration::find($ids);
        $media->addMedia($request->image)->toMediaCollection('posters');
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuration = Configuration::find($id);
        if (empty($configuration)) {
            abort(404);
        }
        return view('layouts.admin.edit_config', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConfiguration $request, $id)
    {
        $data = $request->all();
        $conf = Configuration::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $conf);
        $conf->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('dashboard.index');
    }
    public function checkAndUploadImage($request, $fileName, $collection, $model): void
    {
        if ($file = $request->file($fileName)) {
            if ($model->getMedia($collection)->first()) {
                $model->getMedia($collection)->first()->delete();
            }
            $model->addMediaFromRequest($fileName)->toMediaCollection($collection);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $configuration = Configuration::find($id);
        $configuration->delete();
        return redirect()->route('dashboard.index');
    }
}
