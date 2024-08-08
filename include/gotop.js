(function(){
    $("body").append("<img id='goTopButton' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/>");
    var img = "./bntop02.png",  //宣告變數設定圖檔名稱
      location = 0.5,         //按鈕出現在螢幕的高度
      right = 20,             //距離右邊的 px 值
      // left = 780,               //自己改成距離左邊為基準
      opacity = 0.6,          //預設透明度
      speed = 800,            //返回TOP的捲動速度
      $button = $("#goTopButton"), //定義jQuery呼叫圖片ID
      $body = $(document),     //定義jQuery網頁
      $win = $(window);        //定義jQuery瀏覽器chrome
      $button.attr("src", img);//將圖設定到goTopButton的src

      //建立當網頁捲動時，呼叫自訂函數
      window.goTopMove = function(){
        //從網頁取得與頂端距離的數值，約為75-165px之間
        var scrollH = $body.scrollTop(),
            winH = $win.height(),     //從瀏覽器取得高度
            css = { "top": winH * location + "px", "position": "fixed", "right": right, "opacity": opacity};  //將參數設定css
            //如果捲動與網頁頂端超過20px時，則顯示圖片，否則不顯示。
        if (scrollH > 20){
          $button.css(css);
          $button.fadeIn("slow");
        }
        else {
          $button.fadeOut("slow");
          css = {"transform":"none", "transition":"none", "filter":"invert(0)"};
          $button.css(css);
        }
      };

      //設定瀏覽器監聽兩個動作，分別為scroll與resize
      $win.on({
        scroll: function () { goTopMove(); },
        resize: function () { goTopMove(); }
      
      });

      //設定瀏覽器監聽圖片三個動作，分別為：
      //1. 滑鼠滑過去、2.滑鼠滑出去、3.按下時的動作
      $button.on({
        mouseover: function () {$button.css("opacity",1);},
        mouseout: function () {$button.css("opacity", opacity);},
        // click: function () {$("html, body").animate({ scrollTop: 0 }, speed);}
        click: function () {
        //   css={"transform":"rotate(720deg)", "transition":"all 1s ease 0s"};
          css={"transform":"rotateY(300deg)", "transition":"all 1s ease 0s"};
          $button.css(css);
          
          $("html, body").animate({ scrollTop: 0 }, speed);
        }

      });

      
  })(jQuery);