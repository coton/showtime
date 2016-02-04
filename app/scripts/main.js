/*global QRCode*/

var app = app || {};
app.init = function(){
  this.bind_upload_event();
};  

app.bind_upload_event = function(){
  $('#container').dropzone({
    url: 'upload.php',
    maxFiles: 1,
    maxFilesize: 512,
    acceptedFiles: '.jpg,.png,.gif',
        // uploadMultiple: true,
    init: function() {
      this.on('success', function(file) {

        var uuid = file.xhr.responseText.trim();
        $('#artimg').attr('src', 'uploads/' + uuid);

        var url = app.tools.getbaseurl() + 's.html?' + uuid;

        app.generate_qrcode(url);
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