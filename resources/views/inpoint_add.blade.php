@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add_style.css') }}">
@stop

@section('title', '売上ポイント登録')

@section('page_name','売上ポイント登録')

@section('content')
    
    <div class="container-fluid inpoint-box">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary inbox-size">
                    <div class="card-body">                   
                        <form class="form-horizontal" id="app">
                            @csrf
                            <!-- id="app"削除 -->
                            <div class="container main">

                                <!-- 支払い金額 -->
                                <div class="payall-box">
                                    <div class="row">
                                        <p class="col-sm-2 pay-all">支払金額</p>
                                        <p class="col-sm-8 pay-ans" v-text="totalPay_out"></p>
                                        <p class="col-sm-2 pay-all">円</p>
                                    </div>

                                    <!-- 顧客別保有ポイント -->
                                    <div class="row" v-if="allPoints">
                                        <p class="col-sm-2 point-all">保有ポイント</p>
                                        <p class="col-sm-8 total-point">@{{allPoints}}</p>
                                        <p class="col-sm-2 point-all">point</p>
                                    </div>

                                </div>

                                <!-- 登録ボタン押し込み時にバリデーションエラー表示 -->
                                <div v-if="errors.length">
                                    <ul>
                                        <li class="err-msg-li" v-for="error in errors"><span v-text="error"></span></li>
                                    </ul>
                                </div>

                                <!-- 顧客名 -->
                                <div class="form-group row add-box">
                                    <div class="col-sm-2 in-title"><label for="sale" class="col-form-label">顧客名</label></div>
                                    <div class="col-sm-10">
                                        <div class="form-group row add-box">
                                            <select class="col-10 form-control rounded-0" id="client" name="members_id" v-model="members_id" @change="nonePoint">
                                                <option></option>
                                                @foreach($members as $member)
                                                    <option value={{ $member->id }} >{{ $member->club_name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="col-2 input-side"><button type="button" class="btn btn-secondary btn-side" name="" @click="newCliant">N</button></p>
                                        </div>
                                    </div>                           
                                </div>

                                <!-- 売上金額 -->
                                <div class="form-group row add-box">
                                    <div class="col-sm-2 in-title"><label for="sale" class="col-form-label">売上金額</label></div>
                                    <div class="col-sm-10">
                                        <div class="form-group row add-box" v-for="(text,index) in texts">
                                            <input type="number" class="col-10 form-control" name="sale" ref="texts" v-model="texts[index]" @keydown.enter="addInput(index)" id="sale" autocomplete="off">
                                            <p class="col-2 input-side" v-if="texts.length>1"><button type="button" class="btn btn-danger btn-side" name="" @click="removeInput(index)">D</button></p>
                                        </div>
                                    </div>                           
                                </div>

                                <!-- ポイント支払い -->
                                <div class="form-group row add-box" id="pay_point">
                                    <div class="col-sm-2 in-title"><label for="sale" class="col-form-label">ポイント支払</label></div>
                                    <div class="col-sm-10">
                                        <div class="form-group row add-box">
                                            <input type="number" class="col-10 form-control" name="pay_point" v-model="pay_point" autocomplete="off">                                            
                                            <p class="col-2 input-side"><button type="button" class="btn btn-secondary btn-side" name="" @click="allUsePoint">A</button></p>
                                        </div>
                                    </div>                           
                                </div>

                                <!-- ポイント支払いエラーメッセージ -->
                                <div class="row" v-if="errorCheck_02">
                                    <div class="col-sm-2"></div>
                                    <p id="errorText_02" class="col-sm-10 err-msg" v-text="errorCheck_02"></p>
                                </div>

                                <!-- 実行ボタン -->
                                <div class="row form-group row input-btn">
                                    <div class="col-sm-6"><button type="button" class="btn btn-outline-secondary col-sm-12" name="clear_data"  @click="clearText">クリア</button></div>
                                    <div class="col-sm-6"><button type="button" class="btn btn-outline-primary col-sm-12" name="write_data" @click="onSubmit">登録</button></div>
                                </div>

                                <!-- 備考 -->
                                <div>
                                    <p class="sell-ex">※ポイントは支払金額の1％支給します。 </p>
                                    <p class="sell-ex">※売上入力欄は [ Enter ]で入力項目追加出来ます</p>                 
                                    <!-- <p class="sell-ex">※売上金額入力欄は、基準値の 0 が入力されていれば正常に処理されます（誤って入力欄を増やしてしまっても削除する必要がありません）</p> -->
                                    <p class="sell-ex">※入力項目の切り替えは [Tab] を押すことでも切り替えることができます。 </p> 
                                    <!-- <p class="sell-ex">※<span class="ng"> ✖ </span>をクリックすることで売上金額の入力項目を削除できます。</p> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vue.js呼び出し -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<!-- Vue.jsコード -->
<script src="{{ asset('/js/vue.js') }}"></script>

<!-- Enterキー無効 -->
<script src="{{ asset('/js/enter_non.js') }}"></script>
<!-- 売上ポイントクリア -->
<script src="{{ asset('/js/clear_text.js') }}"></script>
<!-- バリデーション -->
<!-- <script src="{{ asset('/js/validation.js') }}"></script> -->














@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop