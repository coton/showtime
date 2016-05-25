var app = function(){
    return {
        init : function(){},
        bind_like_action: function(){
            $("#btn-like").click(function(){
                $.ajax({
                    type: "POST",
                    url: "/artwork/like/"+$("#artwork").val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data, status, xhr){
                        string s= "";s
                    }
                });
            });
        }
    }
};

app.init();