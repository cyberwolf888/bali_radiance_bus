<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SupirController extends Controller
{
    public function index()
    {
        $model = Supir::all();
        return view('backend.supir.manage',['model'=>$model]);
    }

    public function create()
    {
        $model = new Supir();
        return view('backend.supir.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'no_hp' => 'required|max:12|alpha_num',
            'status' => 'required|max:11|alpha_num'
        ]);

        $model = new Supir();
        $model->nama = $request->nama;
        $model->no_hp = $request->no_hp;
        $model->status = $request->status;
        $model->created_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.supir.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Supir::findOrFail($id);
        return view('backend.supir.form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'no_hp' => 'required|max:12|alpha_num',
            'status' => 'required|max:11|alpha_num'
        ]);

        $model = Supir::findOrFail($id);
        $model->nama = $request->nama;
        $model->no_hp = $request->no_hp;
        $model->status = $request->status;
        $model->updated_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.supir.manage');
    }

    public function destroy($id)
    {
        //
    }
}
