/***

HoyaaJs Framework 1.0

*/

var HoyaaJs = {}; 

HoyaaJs._factories = [

	function(){return new XMLHttpRequest();},

	function(){return new ActiveXObject("Msxml2.XMLHTTP");},

	function(){return new ActiveXObject("Microsoft.XMLHTTP");}

];

HoyaaJs.getHttpRequest = function(){

	var httpRequest;

	for(var i=0; i < HoyaaJs._factories.length; i++){

		var func = HoyaaJs._factories[i];

		try{

			httpRequest = func();

			if(httpRequest != null){

				return httpRequest;

			}

		}catch(e){

			continue;

		}

	}

	throw new Error("This browser can not support AJAX.");

};

 

HoyaaJs.GetAjax = function(){

	var argLen = arguments.length;

	if(argLen == 0){

		throw new Error("usage : HoyaaJs.GetAjax(option);");

	}

	if(argLen == 1){

		var arg1 = arguments[0];

		var arg1type = typeof arg1;

		if(arg1type === "object"){

			var url = arg1.url || "";

			if(url == ""){

				throw new Error("this method must have url property.");

			}

			var target = arg1.target || "";

			if(target == ""){

				throw new Error("this method must have target property.");

			}

			HoyaaJs._GetAjax(url, target);

		}

	}else if(argLen == 2){

		HoyaaJs._GetAjax(arguments[0], arguments[1]);

	}

 

};

 

HoyaaJs._GetAjax = function(url, target){

	var request = HoyaaJs.getHttpRequest();

	request.onreadystatechange = function(){

		if(request.readyState == 4 && request.status == 200){

			// 1단계 : target 의 유형체크

			var targetType = typeof target;

			if(targetType === "object" && target.innerHTML){

				target.innerHTML = request.responseText;

			}else if(targetType === "string"){

			// 2단계 : 값을 판단(기준은 css 셀렉터)

				var key = target.charAt(0);

				if(key == "."){

					var doms = document.getElementsByClassName(target.substring(1));

					for(var i=0; i<doms.length;i++){

						var dom = doms[i];

						dom.innerHTML = request.responseText;

					}

				}else if(key == "#"){

					var dom = document.getElementById(target.substring(1));

					if(dom){

						dom.innerHTML = request.responseText;

					}

				}else{

					var doms = document.getElementsByTagName(target);

					for(var i=0; i<doms.length;i++){

						var dom = doms[i];

						alert(dom);

						dom.innerHTML = request.responseText;

					}

				}

			}

		}

	};

 

	request.open("GET", url);

	request.setRequestHeader("Cache-Control","no-cache");

	//request.setRequestHeader("Content-Type","application/x-www-form-encode");

	request.send(null);

};



HoyaaJs.GetPostBody = function(domForm){

	if(domForm && domForm.innerHTML){

		var body = [];

		var domInputs = domForm.getElementsByTagName("input");

alert(3);

		for(var i=0; i<domInputs.length; i++){

			var domInput = domInputs[i];

			if(domInput.name){

				body.push(domInput.name 

					+ "=" 

					+ encodeURIComponent(domInput.value));

			}

		}

alert(4);

		return body.join("&");

	}else{

alert(5);

		return "";

	}

}

var $ = HoyaaJs;