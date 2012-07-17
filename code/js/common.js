//------------------------------------------------------------------------
// ロールオーバー画像切り替え

function smartRollover() {
    if(document.getElementsByTagName) {
        var images = document.getElementsByTagName("img");

        for(var i=0; i < images.length; i++) {
            if(images[i].getAttribute("src").match("_off."))
            {
                images[i].onmouseover = function() {
                    this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));
                }
                images[i].onmouseout = function() {
                    this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));
                }
            }
        }
    }
}

if(window.addEventListener) {
    window.addEventListener("load", smartRollover, false);
}
else if(window.attachEvent) {
    window.attachEvent("onload", smartRollover);
}

//------------------------------------------------------------------------
// ロールオーバー画像切り替え (クリッカブルマップ)

function changeMapImage(url) {
 document.getElementById('map').src = url;
}

//------------------------------------------------------------------------
// フォトギャラリー

$(function() {
    
    $("#GalleryLargePh li:eq(0)").show();
    phChangeThumbs(0);
    $("#GalleryThumbsPh li").each (function(i){
        phChange($(this),i);
    });

    var dep = 1;
    var movflg = false;
    function phChange(ele, num) {
        ele.mouseover(function(){
            if($("#GalleryLargePh li:eq("+num+")").is(":hidden") && !movflg){
                movflg = true;
                phChangeThumbs(num);
                $("#GalleryLargePh li:eq("+num+")").fadeIn("fast", function(){
                    $("#GalleryLargePh li").each (function(i){
                        if(i != num) $(this).hide();
                    });
                    movflg = false;
                }).css("z-index",dep);
                dep ++;
            };
        })
    }

    function phChangeThumbs(num) {
        $("#GalleryThumbsPh li").each (function(i){
            if(i == num){
                $(this).css("cursor","default").css('opacity', 1).addClass("active");
            }else {
                $(this).hover(
                    function () {
                        if(!$(this).hasClass("active")) $(this).css('opacity', 0.7);
                    },
                    function () {
                        if(!$(this).hasClass("active")) $(this).css('opacity', 1);
                    }
                ).css("cursor","pointer").removeClass("active");
            }
        });
    }

    if($("#GalleryThumbsPh div").size() > 0){
        var thumbs_size = $("#articleMainArea.room_detail #GalleryThumbsPh").size() > 0 ? 4 : 5;

        if($("#GalleryThumbsPh li").size() < thumbs_size + 1) {
            $("#GalleryThumbsPh p").addClass("disabled");
        }
        $("#GalleryThumbsPh div").scrollable({
            size: thumbs_size,
            speed: 500,
            clickable: false,
            onSeek: function() {
                $("#GalleryThumbsPh p").each( function(){
                    if($(this).hasClass("disabled")) {
                        $(this).css('opacity', 0.1).hover(
                            function () {
                                $(this).css('opacity', 0.1);
                            },
                            function () {
                                $(this).css('opacity', 0.1);
                            }
                        );
                    }else {
                        $(this).css('opacity', 1).hover(
                            function () {
                                $(this).css('opacity', 0.7);
                            },
                            function () {
                                $(this).css('opacity', 1);
                            }
                        );
                    }
                });
            }
        })
        
        $("#GalleryThumbsPh p").each( function(){
            if($(this).hasClass("disabled")) {
                $(this).css('opacity', 0.1).hover(
                    function () {
                        $(this).css('opacity', 0.1);
                    },
                    function () {
                        $(this).css('opacity', 0.1);
                    }
                );
            }else {
                $(this).css('opacity', 1).hover(
                    function () {
                        $(this).css('opacity', 0.7);
                    },
                    function () {
                        $(this).css('opacity', 1);
                    }
                );
            }
        });
    }


    if($("a[rel=popup]").size() > 0){
        $("a[rel=popup]").unbind('click').fancybox({
            titleShow:false,
            autoScale:false,
            scrolling:"none"
        });
    }
});
