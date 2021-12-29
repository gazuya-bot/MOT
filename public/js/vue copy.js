new Vue({
    el: '#app', // id
    data: {
        errors: [], // エラー配列
        members_id: '',
        texts: [''], // 複数入力のデータ（配列）
        pay_point: '',
        maxTextCount: 10,
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
                    // console.log(maxIndex)
                    this.$refs['texts'][maxIndex].focus(); // 追加された入力ボックスにフォーカスする
                });
            }
        },

        // 売上入力欄削除
        removeInput(index) {
                this.texts.splice(index, 1);
        },

        onSubmit() { // 桁数制限がかかっている？

            // console.log(this.texts);

            if(this.checkForm){

                const url = '/point_add_js';
                const params = {
                    members_id: this.members_id,
                    // texts: this.texts,
                    total_sale: this.totalSale,
                    total_pay: this.totalPay,
                    pay_point: this.pay_point
                };
            
                console.log(this.checkForm); // TRUE
                // this.pay_point = 0;

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
                console.log(this.checkForm); // FALSE
            }
        },
    },
    // 計算式を入力
    computed: {
        // isTextMax() {
        //     return (this.texts.length >= this.maxTextCount);
        // },
        // remainingTextCount() {
        //     return this.maxTextCount - this.texts.length; // 追加できる残り件数
        // },
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
            var pay_point = this.pay_point;
            const total_pay = totals - pay_point;
            // カンマ区切りで値を渡す
            // return total_pay.toLocaleString();
            return total_pay;
        },
        
        checkForm() {
            if (this.members_id && this.totalPay > 1) {
                // データ書き込み実行
                return true;
            }
            // ここでエラーを配列に代入する            

            this.errors = [];

            if (!this.members_id) {
                this.errors.push('顧客名を選択されていません。');
                // console.log('顧客名を選択されていません。');
            }
            if (this.totalSale < 1) {
                this.errors.push('売上金額が入力されていません。');
                // console.log('売上金額が入力されていません。');
            }
            if (this.totalSale < this.pay_point) {
                this.errors.push('ポイント支払いが購入金額を上回っています。');
                // console.log('ポイント支払いが購入金額を上回っています。');
            }


            return false;
        }
    }
});