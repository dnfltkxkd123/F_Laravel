/*

*/

window.onload = funcLogin;//윈도우를 싱행하면 funcLogin함수 실행

var script = document.createElement("script");//document객체를 할용해서 script생성
script.src = "js2.js";//script 정보를 불러올 파일설정
document.getElementsByTagName("head")[0].append(script);//head태그안에 설정한 script의 정보 추가

function getLoginForm(){
    var domForms = document.getElementsByTagName('form');
    return domForms[0];
}//docment 객체를 활용해서 첫번째 form 태그값을 리턴

function funcLogin(){
   // alert("call! funcLogin()")
    domLoginForm = getLoginForm();//첫번째 form 값의 정보를 받음
    if(!domLoginForm){
        alert("No Form Data!");
        return;
    }//form 값이 없으면 종료
    domLoginForm.onsubmit/*form태그의 submit이벤트 설정*/ = function(){
        //alert("Submit Click!");
        var userId = document.getElementById('user_id').value;
        var userPwd = document.getElementById('user_pwd').value;
        var body = "ajax=true&user_id=" + encodeURIComponent(userId) + "&user_pwd=" + encodeURIComponent(userPwd);//
        var request = $.getHttpRequest();
        //alert(request.responseText);
        request.onreadystatechange = function(){
            if(request.readyState ==4){
                alert(request.responseText);
                var resText =request.responseText;
                if(resText == "true"){
                    domLoginForm.style.display = "none";
                    var ele = document.createElement('div');
                    ele.innerHTML = "지쳤다";
                    document.getElementsByTagName('body')[0].append(ele);
                }else{
                    alert("아이디와 비밀번호를 다시 확인");
                }
            }
            
        }
        request.open("POST","loginok.php",true);
        request.setRequestHeader("Content-Type","application/x-www-form-en");
        request.send(body);
        alert(body);
        alert(userId + " " + userPwd);
        return false;//이동하지 못하게 함
    }
}