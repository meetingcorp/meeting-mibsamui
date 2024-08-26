<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request);
        if($request->title){
            setting(['title' => $request->title])->save();
        }
        if($request->tel1){
            setting(['telle' => $request->tel1])->save();
        }
        if($request->facebook_info){
            setting(['facebook_info' => $request->facebook_info])->save();
        }
        if($request->line_info){
            setting(['line_info' => $request->line_info])->save();
        }
        if($request->map_info){
            setting(['map_info' => $request->map_info])->save();
        }
        if($request->meta_description){
            setting(['meta_description' => $request->meta_description])->save();
        }
        if($request->meta_keyword){
            setting(['meta_keyword' => $request->meta_keyword])->save();
        }
        if($request->aboutus_info){
            setting(['aboutus_info' => $request->aboutus_info])->save();
        }

        if ($request->file('logonav')){
            if(!empty(setting('logonav'))){
                File::delete(public_path(setting('logonav')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 300;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('logonav');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['logonav' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('logologin')){
            if(!empty(setting('logologin'))){
                File::delete(public_path(setting('logologin')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 300;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('logologin');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['logologin' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('favicon')){
            if(!empty(setting('favicon'))){
                File::delete(public_path(setting('favicon')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 300;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('favicon');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['favicon' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('ogimage')){
            if(!empty(setting('ogimage'))){
                File::delete(public_path(setting('ogimage')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 150;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('ogimage');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['ogimage' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('news')){
            if(!empty(setting('news'))){
                File::delete(public_path(setting('news')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 1920;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('news');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['news' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('product')){
            if(!empty(setting('product'))){
                File::delete(public_path(setting('product')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 1920;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('product');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['product' => 'uploads/setting/'.$name])->save();
        }

        if ($request->file('aboutus')){
            if(!empty(setting('aboutus'))){
                File::delete(public_path(setting('aboutus')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 1920;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('aboutus');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['aboutus' => 'uploads/setting/'.$name])->save();
        }
		
		if ($request->file('logoheader')){
            if(!empty(setting('logoheader'))){
                File::delete(public_path(setting('logoheader')));
            }
            //resize image
            $path = storage_path('tmp/uploads');
            $imgwidth = 1920;

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('logoheader');
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $full_path = public_path('uploads/setting/'.$name);
            $img = \Image::make($file->getRealPath());
            if ($img->width() > $imgwidth) {
                $img->resize($imgwidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $img->save($full_path);
            setting(['logoheader' => 'uploads/setting/'.$name])->save();
        }
            Alert::success('บันทึกข้อมูลแล้ว');
        return redirect()->route('setting.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
