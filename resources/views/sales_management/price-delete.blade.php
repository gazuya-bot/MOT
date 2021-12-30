@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '売上削除')

@section('page_name','売上削除')

@section('content')

<div class="card inbox-size">
    <div class="card">
        <div class="col-12">
            <div class="card-body">
                <div class="card-body">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">学校名/部活名</label>
                        <p class="form-control col-3">{{ $point->club_name }}</p>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">売上</label>
                        <p class="form-control col-10">{{ $point->sale }}</p>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">支払いポイント</label>
                        <p class="form-control col-10">{{ $point->pay_point }}</p>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">付与ポイント</label>
                        <p class="form-control col-10">{{ $point->get_point }}</p>
                    </div>
                </div>
                
                <form class="row form-group row input-btn" action="{{route('delete_price', $point->id)}}" method="POST">
                    @csrf
                    <div class="col-sm-6">
                        <a href="{{ route('show_analysis') }}">
                            <button type="button" class="col-sm-12 btn btn-outline-secondary">キャンセル</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="col-sm-12 btn btn-outline-danger" onclick="return confirm('削除します！')">削除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>

@stop