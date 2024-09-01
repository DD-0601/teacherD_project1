<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="./gotop.js"></script>
<script type="text/javascript" src="./include/fancybox-2.1.7/source/jquery.fancybox.js"></script>
<script type="text/javascript">
    //定義滑鼠滑過圖片時，將圖片檔名填入主圖src中
    $(function(){
        $(".card .row.mt-2 .col-md-4 a").mouseover(function(){
            var imgsrc=$(this).children("img").attr("src");
            $("#showGoods").attr({"src":imgsrc});
        });
        //將子圖放到lightbox展示
        $(".fancybox").fancybox();
    });
</script>