var app = function(){
    var global_like_history = "";

    return {
        init : function(){
            if(!app.checkLikeHistory())
                app.bind_like_action();

            app.show_banner();
        },

        show_banner: function(){
            $(".banner").fadeIn(2000);
        },

        checkLikeHistory: function(){
            global_like_history = Cookies.get('like_history');
            if(global_like_history)
            {
                var current_artwork_md5 = $("#artwork").attr("data-md5");
                if(global_like_history.indexOf(current_artwork_md5) > -1)
                {
                    $("#icon-like").hide();
                    $("#icon-like-f").show();

                    if($("#like-count").html() == '0')
                        $("#like-count").html('1');

                    return true;
                }
            }
            return false;
        },

        addLikeToHistory: function(artwork_md5){
            Cookies.set("like_history", global_like_history + ',' + artwork_md5);
        },

        bind_like_action: function(){
            $("#icon-like").click(function(){
                $("#icon-like").hide();
                $("#icon-like-f").show();

                var count = $("#like-count").html();
                $("#like-count").html(parseInt(count)+1);

                $.ajax({
                    method: "POST",
                    url: "/artwork/like/"+$("#artwork").attr("data-md5"),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data, status, xhr){
                        if(data && data.code == 1)
                        {
                            app.addLikeToHistory($("#artwork").attr("data-md5"));
                        }else
                        {
                            alert("like");
                        }
                    }
                });
            });
        }
    }
}();

app.init();
//# sourceMappingURL=artwork.js.map
