new Vue({
    el: '#app', // id
    data: {
        errors: [], // エラー配列
        members_id: '', // 顧客番号
        texts: [''], // 複数入力のデータ（売上金額）
        pay_point: "", // 任意のポイント支払い
        get_point: '',
        // maxTextCount: 10,
        members: '',
        totals: [], // すべてのポイントで支払い
        checks: '0' // メンバーID照合チェック
    },
    methods: {
        // 売上入力欄の追加
        addInput(index) {
            if(this.isTextMax) {
                return;
            }

            // 入力させている場合のみ増加
            if(this.texts[index] != ''){
                this.texts.push(''); // 配列に１つ空データを追加する

                Vue.nextTick(() => {
                    const maxIndex = this.texts.length - 1;
                    this.$refs['texts'][maxIndex].focus(); // 追加された入力ボックスにフォーカスする
                });
            }
        },

        // 売上入力欄削除
        removeInput(index) {
                this.texts.splice(index, 1);
        },

        onSubmit() { 
            if(this.checkForm ){
                const url = '/point_add_js';
                const params = {
                    members_id: this.members_id,
                    texts: this.texts,
                    pay_point: this.payPoint,
                    total_point: this.allPoints
                };
                // console.log(this.checkForm); // TRUE
                
                axios.post(url, params)
                    .then(response => {
                        // 成功した時
                        alert("登録に成功しました。");
                        location.href = '/inpoint';
                    })
                    .catch(error => {
                        // 失敗した時
                        alert("登録に失敗しました。\n原因不明のエラーが発生しました。");
                });
            } else {
                // エラーメッセージの作成
                // console.log(this.checkForm); // FALSE
                alert("登録に失敗しました。\n入力内容に不備があります。");
            }
        },

        // 保有ポイント（データベースより合計値取得）
        getJsonData() {
            const url = '/json_data';
            axios.get(url)
                .then(response => {
                    this.totals = response.data.total_points;
                    // console.log(this.totals);
                });
        },

        // 未登録者選択ボタン
        newCliant() {
            this.members_id = 1;
            // 未登録者の場合ポイント支払い非表示
            document.getElementById("pay_point").style.display ="none";
        },
        
        // すべてのポイントを使用ボタン
        allUsePoint() {
            if (this.members_id != '' && this.totals != ''){
                // var ans = this.allPoints;
                this.pay_point = this.allPoints;
            } else {
                console.log('all_point_error');
            }
        },

        // 未登録者の場合ポイント支払い非表示
        nonePoint() { 
            if (this.members_id == 1 || this.allPoints == 0) {
                document.getElementById("pay_point").style.display ="none";
            } else {
                document.getElementById("pay_point").style.display ="";
            }
        },

        // 売上ポイントクリア
        clearText(){
            var res = confirm("入力内容を削除しても良いでしょうか？");
            if(res == true) {
                location.href = "/inpoint";
            }
        }
    },

    // ページ読み込み時に実行
    mounted() {
        this.getJsonData(); // ① データ取得メソッドを実行
    },


    // 計算式を入力
    computed: {
        // ポイント支払い空白回避
        payPoint() {
            if ( this.pay_point == '') {
                return 0;
            } else {
                return this.pay_point;
            }
        },
        // 売上合計金額
        totalSale() {
            const texts = this.texts;
            let total = 0;
            texts.forEach(function(value){
                // 入力がある場合のみ計算
                if(value != ''){
                    total += parseInt(value);
                }
            });
            return total;
        },
        // 支払金額
        totalPay() {
            var totals = this.totalSale;
            var pay_point = this.payPoint;
            const total_pay = totals - pay_point;
            return total_pay;
        },

        // カンマ区切りで値を渡す(.toLocaleString())
        totalPay_out() {
            return this.totalPay.toLocaleString();
        },
        
        checkForm() {
            if (this.members_id && this.totalSale > 0 && this.allPoints >= this.pay_point) {
                // データ書き込み実行
                return true;
            }
            // ここでエラーを配列に代入する            
            this.errors = [];

            if (!this.members_id) {
                this.errors.push('顧客名を選択されていません。');
            }
            if (this.totalSale < 1) {
                this.errors.push('売上金額が入力されていません。');
            }
            if (this.totalSale < this.pay_point) {
                this.errors.push('ポイント支払いが購入金額を上回っています。');
            }
            if (this.allPoints < this.pay_point) {
                this.errors.push('ポイント支払いが保有ポイント数を超えています。');
            }

            return false;
        },

        // ポイント支払（注意喚起）
        errorCheck_02() {
            if (this.members_id != '' ){

                if( this.totalSale < this.pay_point ) {
                    err_02 = '売上金額以下の数値を入力してください。';
                    return err_02;
                } else if (this.allPoints){
                    var ans = this.allPoints;
                    if( ans < this.pay_point) {
                        err_02 = '保有ポイント以下の数値を入力してください。';
                        return err_02;
                    }
                } else {
                    return null;
                }
            }
        },

        // 顧客名選択確認
        cliantCheck() {
            if( this.members_id != '') {
                return true;
            } else {
                return false;
            }
        },

        // 顧客ごとの保有ポイント検索
        allPoints() {
            this.checks = [];
            for(var i in this.totals) {
                var user = this.totals[i];
                if(user.members_id == this.members_id) {
                    var all_point = user;
                    var ans = all_point;
                    var test = Number(ans.total_point);
                    this.checks = 1;
                    console.log('test01');
                    return test;
                }
            }
            if (this.checks == 0) {
                return 0;
            }
        }

    }
});