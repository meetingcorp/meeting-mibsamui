<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Product::with('product_category')->selectRaw('products.*');
            return DataTables::make($data)
                ->addIndexColumn()
                ->addColumn('btn',function ($data){
                    $btn = '<a class="btn btn-warning" href="'. route('product.edit',['product' => $data['slug']]).'"><i
                            class="fa fa-pen"
                            data-toggle="tooltip"
                            title="แก้ไข"></i></a>
                            <button class="btn btn-danger" onclick="deleteConfirmation('.$data["id"].')"><i
                            class="fa fa-trash"
                            data-toggle="tooltip"
                            title="ลบข้อมูล"></i></button>';
                    return $btn;
                })
                ->addColumn('switches',function ($data){
                    if($data['publish']){
                        $switches = '<label class="switch">
                                    <input type="checkbox" checked value= "0" id="' . $data['id'] . '" onchange="publish(this)">
                                    <span class="slider round"></span>
                                    </label>';
                    }else{
                        $switches = '<label class="switch">
                                  <input type="checkbox" value="1" id="'.$data['id'].'" onchange="publish(this)">
                                  <span class="slider round"></span>
                                </label>';
                    }
                    return $switches;
                })
                ->addColumn('sorting',function ($data){
                    $sorting = '<input name="sort" type="number" class="form-control"
                    value="'.$data['sort'].'" id="'. $data['id'] . '" onkeyup="sort(this)">';
                    return $sorting;
                })
                ->addColumn('img', function ($data){
                    if($data->getFirstMediaUrl('product')){
                        $img = '<img src="'.$data->getFirstMediaUrl('product').'" style="width: 75px; height: 80px;">';
                    }else{
                        $img = '<img src="'.asset('images/no-image.jpg').'" style="width: 75px; height: 80px;">';
                    }
                    return $img;
                })
                ->rawColumns(['btn','switches','sorting', 'img'])
                ->make(true);
        }
        return view('admin.product.productall.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = ProductCategory::all();
        return view('admin.product.productall.create',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->file('imgs'));

        $product = new Product();
        $product->title = $request->title;
        $product->normal_price = $request->price;
        $product->spacial_price = $request->spacialprice;
        $product->short_detail = $request->shortdetail;
        $product->detail = $request->detail;
        $product->meta_tag = $request->metatag;
        $product->meta_description = $request->metadesc;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();

        if($product->save()){
            // dd($request);
            $product->product_category()->attach($request->categorys);
			$path = storage_path('app/public');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
            if($request->file('imgs')){
                foreach ($request->file('imgs') as $imgs){
                    $getImage = $imgs;
                    $newname = time().'.'.$getImage->extension();
                    Storage::putFileAs('public', $getImage, $newname);
                    $product->addMedia(storage_path('app/public').'/'.$newname)->toMediaCollection('product');
                }
            }
            Alert::success('บันทึกข้อมูล');
            return redirect()->route('product.index');
        }
        Alert::error('ไม่สามารถบันทึกข้อมูลได้');
        return redirect()->route('product.create');
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

    public function edit(Product $product)
    {
        $product = $product;
        $procate = ProductCategory::all();

        // dd($product->product_category()->where('id', 1)->pluck('title'));

        // dd($product->product_category()->pluck('title')->toArray());


        return view('admin.product.productall.edit',compact('product','procate'));
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
        $product = Product::whereId($id)->first();
        $product->title = $request->title;
        $product->normal_price = $request->price;
        $product->spacial_price = $request->spacialprice;
        $product->short_detail = $request->shortdetail;
        $product->detail = $request->detail;
        $product->meta_tag = $request->metatag;
        $product->meta_description = $request->metadesc;
        $product->updated_at = Carbon::now();
        if($product->save()){
            $product->product_category()->sync($request->categorys);
			$path = storage_path('app/public');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
            if($request->file('imgs')){
                $medies = $product->getMedia('product');
                if(count($medies) > 0){
                    foreach ($medies as $media) {
                        $media->delete();
                    }
                }

                foreach ($request->file('imgs') as $imgs){
                    $getImage = $imgs;
                    $newname = time().'.'.$getImage->extension();
                    Storage::putFileAs('public', $getImage, $newname);
                    $product->addMedia(storage_path('app/public').'/'.$newname)->toMediaCollection('product');
                }
            }
            Alert::success('บันทึกสำเร็จ');
            return redirect()->route('product.index');
        }
        return redirect()->route('product.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = false;
        $message = 'ไม่สามารถลบข้อมูลได้';
        $page = Product::whereId($id)->first();
        if ($page->delete()) {
            $status = true;
            $message = 'ลบข้อมูลเรียบร้อย';
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }

    public function publish($id, Request $request){
        $status = false;
        $message = 'ไม่สามารถบันทึกข้อมูลได้';

        $page = Product::whereId($id)->first();
        $page->publish = $request->data;
        $page->updated_at = Carbon::now();
        if($page->save()){
            $status = true;
            $message = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }

    public function sort($id, Request $request){
        // dd($request->data);
        $status = false;
        $message = 'ไม่สามารถบันทึกข้อมูลได้';

        $page = Product::whereId($id)->first();
        $page->sort = $request->data;
        $page->updated_at = Carbon::now();
        if($page->save()){
            $status = true;
            $message = 'บันทึกข้อมูลเรียบร้อย';
        }
        return response()->json(['status' => $status, 'message' => $message]);
    }
}
