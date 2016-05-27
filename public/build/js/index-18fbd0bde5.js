/*global QRCode*/

var app = function(){
    return {
        init: function () {
            app.bind_upload_event();
            app.generate_example_qrode();
            app.bind_print_qrcode_event();
        },

        generate_qrcode: function (url) {
            $('#qrcode').html('');
            var qrcode = new QRCode('qrcode', {
                    width: 200,
                    height: 200
                }
            );
            qrcode.makeCode(url);

            setTimeout(function () {
                $('#download').attr('href', $('#qrcode img').attr('src'));
            }, 1000);
        },

        bind_print_qrcode_event: function () {
            $('#print').click(function () {
                $('#qrcode').printArea();
            });
        },

        generate_example_qrode: function () {
            this.generate_qrcode($('#_base_url').val() + '/77ba0f834c6e985697e8779a23f784b4');
        },

        bind_upload_event : function () {
            $('#container').dropzone({
                url: '/artwork/add',
                clickable: true,
                maxFilesize: 20,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                acceptedFiles: '.jpg,.png,.gif',
                init: function () {
                    this.on("addedfile", function (file) {
                        $('#artimg').hide();
                        $('.process').show();
                    });

                    this.on('uploadprogress', function (file, rate) {
                        $(".process-rate").html(Math.floor(rate) + "%");
                    });

                    this.on('error', function (event, errorMessage, xhr) {
                        $('.process').hide();
                        $('.process-rate').html(errorMessage);
                    });

                    this.on('success', function (file, rs) {
                        if (rs && rs.code == 1) {
                            $('#artimg').attr('src', rs.url);

                            $(".process-rate").html("");
                            $('#artimg').fadeIn();

                            app.generate_qrcode(rs.qrurl);
                        } else {
                            var error_message = 'Upload Failed!';

                            if (rs && rs.code == 9) {
                                app.generate_qrcode(rs.qrurl);
                                error_message = 'File already exist! Scan the QR Code to check!';
                            }

                            $('.process-rate').html(error_message);
                        }

                        $('.process').hide();
                    });
                }

            });
        }
    }

}();

app.init();
//# sourceMappingURL=index.js.map
