<html>
<body>
<div id="app">

    <!-- 入力ボックスを表示する場所 ① -->
    <div v-for="(text,index) in texts">
        <!-- 各入力ボックス -->
        <input ref="texts"
            type="text"
            v-model="texts[index]"
            @keypress.shift.enter="addInput">
        <!-- 入力ボックスの削除ボタン -->
        <button type="button" @click="removeInput(index)">削除</button>
    </div>

    <!-- 入力ボックスを追加するボタン ② -->
    <button type="button" @click="addInput" v-if="!isTextMax">
        追加する（残り<span v-text="remainingTextCount"></span>件）
    </button>
    <br><br>
    Ctrl + Enterキーで入力項目を追加できます（ショートカット）

    <!-- 入力されたデータを送信するボタン ③ -->
    <br><br>
    <button type="button" @click="onSubmit">送信する</button>

    <!-- 確認用 -->
    <hr>
    <label>textsの中身</label>
    <div v-text="texts"></div>

</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

<script>
    new Vue({
        el: '#app',
        data: {
            texts: [''], // 複数入力のデータ（配列）,
            maxTextCount: 5
        },
        methods: {
            // ボタンをクリックしたときのイベント ①〜③
            addInput() {
                if(this.isTextMax) {
                    return;
                }
                this.texts.push(''); // 配列に１つ空データを追加する

                Vue.nextTick(() => {
                    const maxIndex = this.texts.length - 1;
                    console.log(maxIndex)
                    this.$refs['texts'][maxIndex].focus(); // 追加された入力ボックスにフォーカスする
                });
            },
            removeInput(index) {
                this.texts.splice(index, 1);
            },

            onSubmit() {
                
                const msg = '送信ボタンが押されました';
                console.log(msg);

                // const url = '/multiple_inputs';
                const url = '/multiple_inputs02';
                const params = {
                    texts: this.texts
                };
                axios.post(url, params)
                    .then(response => {
                        // 成功した時
                        console.log("成功");
                        // console.log(params);
                        // alert("成功");
                        // location.href = "/multiple_inputs/";
                    })
                    .catch(error => {
                        // 失敗した時
                        console.log("失敗");
                    });
            }
        },
        computed: {
            isTextMax() {
                return (this.texts.length >= this.maxTextCount);
            },
            remainingTextCount() {
                return this.maxTextCount - this.texts.length; // 追加できる残り件数
            }
        }
    });
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop