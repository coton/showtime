var app = function(){
    return {
        init: function(){
            app.generate_artwork_qrcode();
            app.bind_showqrcode_event();
        },

        generate_qrcode: function (id, url) {
            $(id).html('');
            var qrcode = new QRCode(id, {
                    width: 200,
                    height: 200
                }
            );
            qrcode.makeCode(url);
        },

        generate_artwork_qrcode: function(){
            $.each($(".qrcode"), function(){
                app.generate_qrcode($(this).attr("id"), $(this).attr("data-qrurl"));
            });
        },

        bind_showqrcode_event : function(){
            $.each($(".btn-qrcode"), function(){
                $(this).mouseenter(function(){
                    $("#" + $(this).attr("data-artwork")).show();
                }).mouseleave(function(){
                    $("#" + $(this).attr("data-artwork")).hide();
                });
            });
        }
    }
}();

app.init();