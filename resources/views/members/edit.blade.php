@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">
@stop

@section('title', '顧客編集')

@section('page_name','顧客編集')

@section('content')


@section('content')
<!-- 編集フォーム -->
<div class="card inbox-size">
    <div class="col-12">
        <div class="card-body">
            <form method="POST" action="{{ route('update', ['id'=>$member->id]) }}" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputclubname" class="col-sm-2 col-form-label">事業所名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputclubname" name="club_name" value="{{ $member->club_name }}">

                            @error('name')
                            {{$message}}
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-2 col-form-label">メールアドレス</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputemail" name="email" value="{{ $member->email }}">

                            @error('name')
                            {{$message}}
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-2 col-form-label">住所</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputaddress" name="address" value="{{ $member->address }}">

                            @error('name')
                            {{$message}}
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">顧問名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputname" name="name" value="{{ $member->name }}">

                            @error('name')
                            {{$message}}
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtel" class="col-sm-2 col-form-label">連絡先</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="inputtel" name="tel" value="{{ $member->tel }}">

                            @error('name')
                            {{$message}}
                            @enderror
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputfax" class="col-sm-2 col-form-label">FAX</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="inputfax" name="fax" value="{{ $member->fax }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputmemo" class="col-sm-2 col-form-label">備考</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputmemo" name="memo" value="{{ $member->memo }}">
                        </div>
                    </div>
                </div>

                <div class="row form-group row input-btn">
                    <div class="col-sm-6">
                        <a href="{{ route('detail', ['id'=>$member->id]) }}">
                            <button type="submit" class="btn btn-outline-secondary col-sm-12">キャンセル</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-outline-primary col-sm-12">更新</button>
                    </div>
                </div>
            </form>
        </div>                                  
    </div> 
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop