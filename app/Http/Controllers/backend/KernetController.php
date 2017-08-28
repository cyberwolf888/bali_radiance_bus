<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kernet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class KernetController extends Controller
{
    public function index()
    {
        $model = Kernet::all();
        return view('backend.kernet.manage',['model'=>$model]);
    }

    public function create()
    {
        $model = new Kernet();
        return view('backend.kernet.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'no_hp' => 'required|max:12|alpha_num',
            'status' => 'required|max:11|alpha_num'
        ]);

        $model = new Kernet();
        $model->nama = $request->nama;
        $model->no_hp = $request->no_hp;
        $model->status = $request->status;
        $model->created_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.kernet.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Kernet::findOrFail($id);
        return view('backend.kernet.form',[
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

        $model = Kernet::findOrFail($id);
        $model->nama = $request->nama;
        $model->no_hp = $request->no_hp;
        $model->status = $request->status;
        $model->updated_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.kernet.manage');
    }

    public function destroy($id)
    {
        //
    }
}
