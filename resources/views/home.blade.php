@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_style.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
@stop

@section('title', 'ホーム')

@section('page_name','ホーム')

@section('content')

<div class="home-box container-fluid">
    <!-- 時計 -->
    <div class="container02">
        <div class="clock">
        <p class="clock-date"></p>
        <p class="clock-time"></p>
        </div>
    </div>

    <!-- 売上ポイント登録ボタン -->
    <div class="row form-group row">
        <a href="/inpoint" class="col-sm-12">
            <div>
                <button type="button" class="btn btn-outline-dark col-sm-12">売上ポイント登録</button>
            </div>
        </a>
    </div>

    <!-- 売上管理ボタン -->
    <div class="row form-group row">
        <a href="/sales_management" class="col-sm-12">
            <div>
                <button type="button" class="btn btn-outline-dark col-sm-12">売上管理</button>
            </div>
        </a>
    </div>

    <!-- 顧客一覧ボタン -->
    <div class="row form-group row">
        <a href="/members/memberlist" class="col-sm-12">
            <div>
                <button type="button" class="btn btn-outline-dark col-sm-12">顧客一覧</button>
            </div>
        </a>
    </div>
</div>

<script src="{{ asset('/js/clock.js') }}"></script>

@stop