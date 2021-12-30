@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '売上編集')

@section('page_name','売上編集')

@section('content')

<div class="card inbox-size">
    <div class="col-12">
        <div class="card-body">
            <form action="{{route('update_price', $point->id)}}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">学校名/部活名</label>
                        <select class="form-control col-3" name="members_id">
                            @foreach($members_lists as $members_list)
                            <option <?php if ($point->members_id === $members_list->id) {
                                        echo ' selected';
                                    } ?> value="{{$members_list->id}}">{{$members_list->club_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">売上</label>
                        <input type="text" class="form-control col-sm-10"  value="{{  $point->sale }}" name="sale">
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">支払いポイント</label>
                        <input type="text" class="form-control col-sm-10" value="{{  $point->pay_point }}" name="pay_point">
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">付与ポイント</label>
                        <input type="text" class="form-control col-sm-10" value="{{  $point->get_point }}" name="get_point" disabled>
                    </div>
                </div>

                <div class="row form-group row input-btn">
                    <div class="col-sm-6">
                        <a href="{{ route('show_analysis') }}">
                            <button type="button" class="col-sm-12 btn btn-outline-secondary">キャンセル</button>
                        </a>
                    </div>
                    <div class="col-sm-6"><button type="submit" class="col-sm-12 btn btn-outline-primary">変更</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
</div>

@stop