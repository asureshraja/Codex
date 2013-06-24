function chk()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","retrieve.php?userid="+document.signup.newusrnam.value,true);
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var x=xmlhttp.responseText;
    if(x=="not available")
    {
	alert("username not available");document.signup.newusrnam.style.color="red";}
    }
  }
xmlhttp.send();
} 
function loginusername1(e)
{
	if(e.value=="username")
	{e.value="";e.style.color="black";}
}
function loginusername2(e)
{
	if(e.value=="")
	{e.value="username";e.style.color="grey";}
}
function loginpassword1(e)
{
	if(e.value=="password")
	{
	e.value="";e.style.color="black";
	}
    e.type="password";
}
function loginpassword2(e)
{
	if(e.value=="")
	{
	e.type="text";
	e.value="password";e.style.color="grey";
	}
}

function regbox(e)
{
	if(e.value!="")
	{e.value="";e.style.color="black";}
}
function regusername(e)
{
	if(e.value=="")
	{e.value="enter your username";e.style.color="grey";}
	else if(e.value!="enter your username")
	chk();
}
function regemail(e)
{
	if(e.value=="")
	{e.value="enter your email";e.style.color="grey";}
}
function regrealname(e)
{
	if(e.value=="")
	{e.value="enter your full name";e.style.color="grey";}
}


function validate(e)
{


var email=e.value;
if(email.indexOf(".")==-1 || email.indexOf("@")==-1 || email.lastindexOf(".")<email.indexOf("@"))
{
alert("not a valid email id"); 
}
else
this.form.submit();

}