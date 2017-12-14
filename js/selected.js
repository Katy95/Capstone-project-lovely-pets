var xmlHttp

function showUser(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="try1.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function editUser(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="edit.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged2 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function transactionUser(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="invoice.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged3 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function startUser(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="start.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged4 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function stateChanged2() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("editHint").innerHTML=xmlHttp.responseText 
 } 
}

function stateChanged3() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("transactionHint").innerHTML=xmlHttp.responseText 
 } 
}

function stateChanged4() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("startHint").innerHTML=xmlHttp.responseText 
 } 
}


function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}