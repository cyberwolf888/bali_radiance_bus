<?php

namespace App\Http\Controllers\Backend;

use App\Models\DetailTransaksi;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $model = Transaksi::orderBy('id','desc')->get();
        return view('backend/transaksi/manage',[
            'model'=>$model
        ]);
    }

    public function kendaraan()
    {
        $model = Kendaraan::where('status',Kendaraan::S_TESERDIA)->orderBy('id','desc')->get();
        return view('backend/transaksi/kendaraan',[
            'model'=>$model
        ]);
    }

    public function create($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $model = new Transaksi();
        return view('backend/transaksi/form',[
            'model'=>$model,
            'kendaraan'=>$kendaraan
        ]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:100',
            'telp' => 'required|alpha_num|max:12',
            'paket' => 'required',
            'total' => 'required|alpha_num',
            'supir_id' => 'required',
            'kernet_id' => 'required',
            'durasi' => 'required|alpha_num|max:2',
            'tgl_jalan' => 'required'
        ]);

        /* image
        $path = base_path('images/transaksi/');
        $file = Image::make($request->file('id_image'))->resize(900, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        */
        $model = new Transaksi();
        $model->kendaraan_id = $id;
        $model->supir_id = $request->supir_id;
        $model->kernet_id = $request->kernet_id;
        $model->nama = $request->nama;
        $model->telp = $request->telp;
        $model->tgl_jalan = date('Y/m/d',strtotime($request->tgl_jalan));
        $_durasi = $request->durasi - 1;
        $model->tgl_kembali = date('Y/m/d', strtotime($model->tgl_jalan. ' + '.$_durasi.' days'));
        $model->durasi = $request->durasi;
        $model->paket = $request->paket;
        $model->total = $request->total;
        $model->status = Transaksi::S_NEW;
        $model->created_by = Auth::user()->id;
        $model->save();
        return redirect()->route('backend.transaksi.manage');
    }

    public function show($id)
    {
        $model = Transaksi::findOrFail($id);
        $detail = DetailTransaksi::where('transaksi_id',$id)->get();

        return view('backend/transaksi/detail',[
            'model'=>$model,
            'detail'=>$detail,
            'total_detail'=>$model->detail->sum('total')
        ]);
    }

    public function finish(Request $request, $id)
    {
        $model = Transaksi::findOrFail($id);
        $model->status = Transaksi::S_FINSIH;
        $model->denda = $model->getDenda()+$request->biaya_tambahan;
        $model->tgl_kembali = date('Y-m-d');
        $model->kmend = $request->km_end;
        $model->save();

        $kendaraan = $model->kendaraan;
        $kendaraan->kmmeter = $request->km_end;
        $kendaraan->status = Kendaraan::S_TESERDIA;
        $kendaraan->save();

        return redirect()->route('backend.transaksi.manage');
    }

    public function cancel($id)
    {
        $model = Transaksi::findOrFail($id);
        $model->status = Transaksi::S_CANCELED;
        $model->save();

        $kendaraan = $model->kendaraan;
        $kendaraan->status = Kendaraan::S_TESERDIA;
        $kendaraan->save();
        return redirect()->route('backend.transaksi.manage');
    }

    public function invoice($id)
    {
        $model = Transaksi::findOrFail($id);
        return view('backend/transaksi/invoice',[
            'model'=>$model
        ]);
    }

    public function detail_create($id)
    {
        $transaksi = Transaksi::find($id);
        $model = new DetailTransaksi();

        return view('backend.transaksi.form_detai',[
            'transaksi'=>$transaksi,
            'model'=>$model
        ]);
    }

    public function detail_store($id,Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required|max:100',
            'total' => 'required|alpha_num'
        ]);

        $model = new DetailTransaksi();
        $model->transaksi_id = $id;
        $model->keterangan = $request->keterangan;
        $model->total = $request->total;
        $model->created_by = Auth::user()->id;
        $model->save();

        return redirect()->route('backend.transaksi.detail',$id);
    }
}
