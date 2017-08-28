@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Kendaraan
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
            <a href="{{ route('backend.kendaraan.manage') }}">Kendaraan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Add New Data</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
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
                    {!! Form::open(['route' => isset($update) ? ['backend.kendaraan.update', $model->id] : 'backend.kendaraan.store', 'files' => true]) !!}
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

                            <div class="form-group form-md-line-input {{ $errors->has('id') ? ' has-error' : '' }}">
                                {!! Form::text('id', $model->id, ['id'=>'id','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="id">Plat Nomer</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('kmmeter') ? ' has-error' : '' }}">
                                {!! Form::number('kmmeter', $model->kmmeter, ['id'=>'kmmeter','placeholder'=>'','class'=>'form-control', 'required','min'=>0]) !!}
                                <label for="harga">Km Meter</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('ket') ? ' has-error' : '' }}">
                                {!! Form::text('ket', $model->ket, ['id'=>'ket','placeholder'=>'','class'=>'form-control']) !!}
                                <label for="merek">Keterangan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('status') ? ' has-error' : '' }}">
                                {!! Form::select('status', ['1'=>'Tersedia','0'=>'Tidak disewakan'], $model->status,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="status">Status Kendaraan</label>
                            </div>
                        </div>
                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@push('scripts')
@endpush