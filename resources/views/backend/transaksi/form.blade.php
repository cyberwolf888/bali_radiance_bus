@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
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
            <span class="active">Add New Data</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        {!! Form::open(['route' => ['backend.transaksi.store', $kendaraan->id], 'files' => true]) !!}
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Add New Data</span>
                    </div>
                </div>

                <div class="portlet-body form">

                    <div class="form-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <h4 class="alert-heading">Ooppss ada error.</h4>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close font-red-mint"></i>&nbsp;{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group form-md-line-input {{ $errors->has('nama') ? ' has-error' : '' }}">
                            {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="nama">Nama Customer</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('telp') ? ' has-error' : '' }}">
                            {!! Form::text('telp', $model->telp, ['id'=>'telp','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="telp">Telp Customer</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('paket') ? ' has-error' : '' }}">
                            {!! Form::select('paket', ['1'=>'Operland','2'=>'Fullday'], $model->paket,['id'=>'paket','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="id_type">Paket Transaksi</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('total') ? ' has-error' : '' }}">
                            {!! Form::number('total', $model->total, ['id'=>'total','placeholder'=>'','class'=>'form-control', 'required', 'min'=>0]) !!}
                            <label for="harga">Total</label>
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Submit</button>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Transaksi </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <div class="form-group form-md-line-input {{ $errors->has('supir_id') ? ' has-error' : '' }}">
                        {!! Form::select('supir_id', \App\Models\Supir::pluck('nama','id'), $model->supir_id,['id'=>'supir_id','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        <label for="id_type">Supir</label>
                    </div>

                    <div class="form-group form-md-line-input {{ $errors->has('fee_sopir') ? ' has-error' : '' }}">
                        {!! Form::number('fee_sopir', $model->fee_sopir, ['id'=>'fee_sopir','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                        <label for="fee_sopir">Fee Sopir</label>
                    </div>

                    <div class="form-group form-md-line-input {{ $errors->has('kernet_id') ? ' has-error' : '' }}">
                        {!! Form::select('kernet_id', \App\Models\Kernet::pluck('nama','id'), $model->kernet_id,['id'=>'kernet_id','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        <label for="id_type">Kernet</label>
                    </div>

                    <div class="form-group form-md-line-input {{ $errors->has('fee_kernet') ? ' has-error' : '' }}">
                        {!! Form::number('fee_kernet', $model->fee_kernet, ['id'=>'fee_kernet','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                        <label for="fee_kernet">Fee Kernet</label>
                    </div>

                    <div class="form-group form-md-line-input {{ $errors->has('tgl_jalan') ? ' has-error' : '' }}">
                        {!! Form::text('tgl_jalan', $model->tgl_jalan, ['id'=>'tgl_jalan','placeholder'=>'','class'=>'form-control date-picker', 'required', 'readonly']) !!}
                        <label for="nama">Tanggal Jalan</label>
                    </div>

                    <div class="form-group form-md-line-input {{ $errors->has('durasi') ? ' has-error' : '' }}">
                        {!! Form::number('durasi', $model->durasi, ['id'=>'durasi','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                        <label for="harga">Durasi</label>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    jQuery(document).ready(function(){
        jQuery().datepicker&&$(".date-picker").datepicker({
            format: 'dd-mm-yyyy',
            orientation:"left",
            autoclose:!0
        });
        $(document).scroll(function(){$(".date-picker").datepicker("place")});
    });

    $("#durasi").change(function () {

        //var total = <?= $kendaraan->harga ?> * $("#durasi").val();
        //$("#total").val(total);
    })
</script>
@endpush