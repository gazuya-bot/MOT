// Enterキー無効
document.getElementById("app").onkeypress = (e) => {
    // form1に入力されたキーを取得
    const key = e.keyCode || e.charCode || 0;
    // 13はEnterキーのキーコード
    if (key == 13) {
        // アクションを行わない
        e.preventDefault();
    }
}
