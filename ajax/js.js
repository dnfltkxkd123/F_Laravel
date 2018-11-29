/***
Framework 1.0
*/
var $ = {};//var $ = {};
$._factoris = [
    function(){return new XMLHttpRequest();},
    function(){return new ActiveXObject("Msxml2.XMLHTTP");},
    function(){return new ActiveXObject("Microsoft.XMLHTTP");}
]
$.getHttpRequest = function(){
  //alert('first call js.getHttpRequest');  
    var httpRequest;
    for(var i=0 ; i<$._factoris.length ; i++){
        var func = $._factoris[i];
        try{
            httpRequest = func();
            if(httpRequest != null){
            //제대로 생성
                return httpRequest;
            }
        }catch(e){
            continue;
        }
        
    }
    throw new Error('This browser can not support AJAX.');
};

$.GetAjax = function(url,id){
    var request = $.getHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState ==4 && request.status == 200){
            var text = request.responseText;
            var tag = document.getElementById(id);
            //alert(tag);
            if(tag){
                //alert('h');
                tag.innerHTML = text;
                //alert('h');
            }
        }
    }
    request.open("GET",url);
    request.setRequestHeader("Cache-Control","no-cache");
    request.send(null);
    //alert('h');
}