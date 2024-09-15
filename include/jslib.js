//將產品p_id加入購物車
    function addcart(p_id){
      var qty = $("#qty").val();
      if (qty <= 0){
        alert("產品數量不得為0或為負數，請修改數量！");
        return (false);
      }
      if (qty == undefined){
        qty = 1;
      }else if (qty >= 50){
        alert("由於採購限制，產品數量將限制在50以下！");
        return (false);
      }

      //利用jquery $.ajax函數呼叫後台的addcart.php
      $.ajax({
        url: './include/addcart.php',
        type: 'get',
        datatype: 'json',
        data: { p_id:p_id, qty:qty, },
        success: function (data){
          if (data.c == true){
            alert(data.m);
            window.location.reload();
          } else {
            alert(data.m);
          }
        },
        error: function (data){
          alert("系統目前無法連接到後台資料庫。");
        }
      });
    }

//跳出確認訊息對話框功能
function btn_confirmLink(message, url){
  if (message =="" || url ==""){
    return false; //如果沒有傳遞 message 或 url，則什麼都不做
  }
  if (confirm(message)){
    window.location=url; //如果用戶點擊"確認"，則跳轉到指定的url
  }
  return false; //無論執行了上方哪一個if，最後都再返回一個false，確保只執行自定義的javascript邏輯及防止按鈕點擊後執行其他默認行為(例:表單的提交)
}
  