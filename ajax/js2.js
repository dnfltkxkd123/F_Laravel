var $ = [];
/*
if(window.XMLHttpRequest === undefined){
    window.XMLHttpRequest = function(){
        try{
            return new ActiveXObject("Msxml2.XMLHTTP");
        }catch(e){
            try{
                return new ActiveXObject("Microsoft.XMLHTTP");
            }catch(e){
                throw new Error("This browser can not support XMLHttpRequest");
            }
        }
    }
}
*/

var ajax = {};
$.factory = [
function(){return new XMLHttpRequest();},
function(){return new ActiveXObject("Msxml2.XMLHTTP");},
function(){return new ActiveXObject("Microsoft.XMLHTTP");}]

$.getHttpRequest = function(){
  //alert('first call js.getHttpRequest');  
    var httpRequest;
    for(var i=0 ; i<$.factory.length ; i++){
        var func = $.factory[i];
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

$.GetAjax = function(){
   var argLen = arguments.length; 
    if(argLen == 0){
        throw new Error("usage : ajax(option);");
    }
    if(argLen == 1){
        var arg1 = arguments[0];
        var arg1type = typeof arg1;
        if(arg1type === "object"){
            var url = arg1 || "";
            //alert(url);
            if(url == ""){
                throw new Error("this method must hvae url property");
            }
            var target = arg1.target || "";
            //alert(target);
            if(target == ""){
                throw new Error("this method must hvae target property");
            }
            $._GetAjax(url,target);
        }
    }else if(argLen == 2){
        $._GetAjax(arguments[0],arguments[1]);
    }
};

$._GetAjax = function(url,target){
  var request = $.getHttpRequest();
  request.onreadystatechange = function(){
       if(request.readyState ==4 && request.status == 200){
           //1단계 : target의 유형체크
           var targetType = typeof target;
           if(targetType === "object" && target.innerHTML){
               target.innerHTML = request.responseText;
           }else if(targetType === "string"){
               //2단계 : 값을 판단(기준은 css 셀렉터)
               var key = target.charAt(0);
               if(key == "."){
                   //target.replace(".","");
                   var name = target.substr(1);
                   var doms =  document.getElementsByClassName(name);
                   for(var i=0 ; i<doms.length ; i++){
                       var dom = doms[i];
                       //alert(dom);
                       dom.innerHTML = request.responseText;
                   }
               }else if(key == "#"){
                  var dom = document.getElementById(target);
                   if(dom){
                       dom.innerHTML = request.responseText;
                       //alert(dom);
                   }
               }else{
                  var doms = document.getElementsByTagName(target);
                   for(var i=0 ; i<doms.length ; i++){
                       var dom = doms[i];
                       dom.innerHTML = request.responseText;
                       //alert(dom);
                   }
               }
           }
       }
  }
  request.open("GET",url);
  request.setRequestHeader("Cache-Control","no-cache");
    //request.setRequestHeader("Content-type","application/x-www-form-en");
  request.send(null);
}
