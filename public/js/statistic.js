var ShowTimeStatistic = function(){
    return {
        sent: function(url, data){
            $.ajax({
                method: 'POST',
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data, status, xhr){
                    var rs = data;
                }
            });
        },

        wechat: function(page, artworkmd5, type){
            var data = {'page': page, 'artworkmd5': artworkmd5, 'type': type};
            ShowTimeStatistic.sent('/wechatstat/add', data);
        }
    }
}();