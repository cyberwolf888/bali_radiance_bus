@extends('layouts.backend')

@push('plugin_css')
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Service
                <small>Add New Data</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('backend.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('backend.transaksi.manage') }}">Transaksi</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Detail Transaksi</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 ">
            <a href="{{ route('backend.transaksi.invoice',$model->id) }}" class="btn blue btn-circle" target="_blank"><i class="fa fa-print"></i> Print Invoice</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567">{{ number_format($model->total,0,',','.') }}</span>
                        </h3>
                        <small>Total</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                            <span class="sr-only">100% grow</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> grow </div>
                        <div class="status-number"> 100% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">{{ number_format($total_detail,0,',','.') }}</span>
                        </h3>
                        <small>Pengeluaran</small>
                    </div>
                    <div class="icon">
                        <i class="icon-like"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only">100% change</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> 100% </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="7800">{{ number_format($model->total-$total_detail,0,',','.') }}</span>

                        </h3>
                        <small>TOTAL PROFIT</small>
                    </div>
                    <div class="icon">
                        <i class="icon-pie-chart"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">100% progress</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress </div>
                        <div class="status-number"> 100% </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Transaksi</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <h4><small>Nama Customer</small></h4>
                                <h4>{{ $model->nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Telp Customer</small></h4>
                                <h4>{{ $model->telp }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tanggal Jalan</small></h4>
                                <h4>{{ date('d/m/Y',strtotime($model->tgl_jalan)) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Durasi</small></h4>
                                <h4>{{ $model->durasi }} Hari</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tanggal Kembali</small></h4>
                                <h4>{{ date('d/m/Y',strtotime($model->tgl_kembali)) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Paket</small></h4>
                                <h4>{{ $model->paket }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Total</small></h4>
                                <h4>Rp {{ number_format($model->total,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Status</small></h4>
                                <h4>{{ $model->getStatus() }}</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Pengeluaran </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <a href="{{ route('backend.transaksi.detail.create',$model->id) }}" class="btn yellow-casablanca btn-circle"><i class="fa fa-plus"></i> Tambah Detail</a>
                    <br><br>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th> Keterangan </th>
                            <th> Jumlah </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no =1 ?>
                        @foreach($detail as $row)
                            <tr>
                                <td> {{ $no }}</td>
                                <td> {{ $row->keterangan }} </td>
                                <td> {{ number_format($row->total,0,',','.') }} </td>
                                <td class="center" width="50">
                                    <a href="{{ route('backend.transaksi.detail',$row->id) }}" class="btn green-steel btn-xs"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush