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

    <div class="container02">
        <div class="clock">
        <p class="clock-date"></p>
        <p class="clock-time"></p>
        </div>
    </div>



    <!-- <div class="col-md-12">
        <div class="row form-group row">
            <div class="col-sm-12">
                <h1 class="col-sm-12 clock">20:00</h1>
            </div>
        </div>             -->

        <div class="row form-group row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-dark col-sm-12">売上ポイント登録</button>
            </div>
        </div>

        <div class="row form-group row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-dark col-sm-12">売上管理</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-outline-info col-sm-12">編集</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-outline-danger col-sm-12">削除</button>
            </div>
        </div>

        <div class="row form-group row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-outline-dark col-sm-12">顧客管理</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-outline-info col-sm-12">編集</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-outline-danger col-sm-12">削除</button>
            </div>
        </div>

    </div>
</div>

<script>
    const clock = () => {
    // 現在の日時・時刻の情報を取得
    const d = new Date();

    // 年を取得
    let year = d.getFullYear();
    // 月を取得
    let month = d.getMonth() + 1;
    // 日を取得
    let date = d.getDate();
    // 曜日を取得
    let dayNum = d.getDay();
    const weekday = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
    let day = weekday[dayNum];
    // 時を取得
    let hour = d.getHours();
    // 分を取得
    let min = d.getMinutes();
    // 秒を取得
    let sec = d.getSeconds();

    // 1桁の場合は0を足して2桁に
    month = month < 10 ? "0" + month : month;
    date = date < 10 ? "0" + date : date;
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    // 日付・時刻の文字列を作成
    let today = `${year}.${month}.${date} ${day}`;
    let time = `${hour}:${min}:${sec}`;

    // 文字列を出力
    document.querySelector(".clock-date").innerText = today;
    document.querySelector(".clock-time").innerText = time;
    };

    // 1秒ごとにclock関数を呼び出す
    setInterval(clock, 1000);
</script>

@stop