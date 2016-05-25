/*global QRCode*/

var app = app || {};
app.init = function(){
    this.bind_upload_event();
    this.print_qrcode();
};

app.bind_upload_event = function(){
    $('#container').dropzone({
        url: '/artwork/add',
        clickable: true,
        maxFilesize: 8,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        acceptedFiles: 'image/*',
        init: function() {
            this.on("addedfile", function(file) {
                $('#artimg').attr('src', '');
                $(".process").show();
            });

            this.on('uploadprogress', function(file, rate){
                $(".process-rate").html(Math.floor(rate) + "%");
            });

            this.on('error', function(event, errorMessage, xhr){
                $(".process-rate").html(errorMessage);
                $(".process").hide();
            });

            this.on('success', function(file, rs) {
                if(rs && rs.code == 1)
                {
                    $('#artimg').attr('src', rs.url);
                    app.generate_qrcode(rs.qrurl);

                    $(".process-rate").html("");
                }else
                {
                    var error_message = "Upload Failed!";

                    if(rs && rs.code == 9)
                    {
                        app.generate_qrcode(rs.qrurl);
                        error_message = "File already exist! Scan the QR Code to check!";
                    }

                    $(".process-rate").html(error_message);
                }

                $(".process").hide();
            });
        }

    });
};

app.generate_qrcode = function(url){
    $('#qrcode').html('');
    var qrcode = new QRCode('qrcode', {
        width: 200,
        height: 200}
    );
    qrcode.makeCode(url);

    setTimeout(function(){
        $('#download').attr('href', $('#qrcode img').attr('src'));
    }, 1000);
};

app.print_qrcode = function(){
    $('#print').click(function(){
        $('#qrcode').printArea();
    });
};


/*-- tools
 ====================================================== */
app.tools = function(){};

app.tools.getbaseurl = function(){
    var url = window.location.href;
    return url.substring(0, url.lastIndexOf('/') + 1);
};



(function(){

    app.init();

})();
//# sourceMappingURL=main.js.map
