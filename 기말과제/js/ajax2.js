function check(id,URL){
      $.ajax({
        url:URL,
        type:'post',
        //dataType:'php',
        data:$('form').serialize(),
        success:function(data){
            alert(data);
          //$(id).html(data);
        }
      });
      
}

function fileCheck(id,URL){
  var formData = new FormData($("#form")[0]);
        $.ajax({
            type : 'post',
            url : URL,
            data : formData,
            processData : false,
            contentType : false,
            success : function(data) {
                //alert(data);
                $(id).html(data);
            }
    });
}