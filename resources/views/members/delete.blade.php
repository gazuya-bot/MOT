@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '顧客削除')

@section('page_name','顧客削除')

@section('content')


@section('content')
<!-- 削除画面 -->
<div class="card inbox-size">
    <div class="card">
        <div class="col-12">
            <div class="card-body">
                <div class="card-body">                              
                    <table id="example2" class="table table-bordered">
                        <tr style="text-align: center;"><th>ID</th><td>{{ $member->id }}</td></tr>
                        <tr style="text-align: center;"><th>学校名 / 部活名</th><td>{{ $member->club_name }}</td></tr>
                        <tr style="text-align: center;"><th>メールアドレス</th><td>{{ $member->email }}</td></tr>
                        <tr style="text-align: center;"><th>住所</th><td>{{ $member->address }}</td></tr>
                        <tr style="text-align: center;"><th>顧問名</th><td>{{ $member->name }}</td></tr>
                        <tr style="text-align: center;"><th>連絡先</th><td>{{ $member->tel }}</td></tr>
                        <tr style="text-align: center;"><th>FAX</th><td>{{ $member->fax }}</td></tr>
                        <tr style="text-align: center;"><th>備考</th><td>{{ $member->memo }}</td></tr>
                    </table>
                    <div class="card-footer">
                        <form class="row form-group row input-btn" method="POST" action="{{ route('destroy', ['id'=>$member->id]) }}">
                            @csrf
                            <div class="col-sm-6">
                                <a href="{{ route('memberlist') }}">
                                    <button type="submit" class="btn btn-outline-secondary col-sm-12">キャンセル</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <input type="button" id="delete" class="btn btn-outline-danger col-sm-12" value="削除">
                            </div>
                        </form>
                    </div>
                </div>
            </div>                                     
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 

    $(function () {
        bsCustomFileInput.init();
    });

    $('#delete').click(function(){
        if(!confirm('削除します！')){
        /* キャンセルの時の処理 */
            return false;
        }else{
        /*OKの時の処理 */
            location.href = '{{route('destroy', $member->id )}}';
        }
    });
</script>
@stop