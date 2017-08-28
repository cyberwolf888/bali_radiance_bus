<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kendaraan;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class KendaraanController extends Controller
{
    public function index()
    {
        $model = Kendaraan::orderBy('id','desc')->get();
        return view('backend/kendaraan/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Kendaraan();
        return view('backend/kendaraan/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|max:10|unique:kendaraan',
            'status' => 'required|max:11|alpha_num',
            'kmmeter' => 'required|max:11|alpha_num'
        ]);

        /* kode untuk gambar
        $path = base_path('images/kendaraan/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        */

        $model = new Kendaraan();
        $model->id = $request->id;
        $model->ket = $request->ket;
        $model->status = $request->status;
        $model->kmmeter = $request->kmmeter;
        $model->created_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.kendaraan.manage');
    }

    public function show($id)
    {
        $model = Kendaraan::findOrFail($id);
        $service = Service::where('kendaraan_id',$id)->orderBy('id','Desc')->get();
        return view('backend/kendaraan/detail',['model'=>$model,'service'=>$service]);
    }

    public function edit($id)
    {
        $model = Kendaraan::findOrFail($id);
        return view('backend/kendaraan/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|max:10',
            'status' => 'required|max:11|alpha_num',
            'kmmeter' => 'required|max:11|alpha_num'
        ]);

        $model = Kendaraan::findOrFail($id);

        /* kode untuk gambar
        if ($request->hasFile('image')) {
            $path = base_path('images/kendaraan/');
            if(is_file($path.$model->image)){
                unlink($path.$model->image);
            }
            $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $model->image = $file->basename;
        }
        */
        $model->id = $request->id;
        $model->ket = $request->ket;
        $model->status = $request->status;
        $model->kmmeter = $request->kmmeter;
        $model->updated_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.kendaraan.manage');
    }

    public function destroy($id)
    {
        //
    }
}
