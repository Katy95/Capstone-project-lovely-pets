// JavaScript Document
function login() 
{  
  
    var username = document.getElementById("username");  
    var pass = document.getElementById("password");  
  
    if (username.value == "") {  
  
        alert("please enter your username");  
  
    } else if (pass.value  == "") {  
  
        alert("please enter your password");  
  
    } else if(username.value == "admin" && pass.value == "123456"){  
  
        window.location.href="./homepage.html";  
  
    } else {  
  
        alert("Your username or password is incorrect.Please try again")  
  
    }  
}