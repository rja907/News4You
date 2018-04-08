var timer="";
function resetOTP(time)
{
    timer=setTimeout(function(){
        var mob=sessionStorage.getItem('mob');
        sessionStorage.clear();
        alert("Sorry Your OTP Has Expired");
        window.location="http://myversal.com";
    },time);
}
function OTPSendSuccessfully()
{
    //If The OTP Is Sent SuccessFully
    document.f1.Mobile.value=sessionStorage.getItem('mob');
    document.f1.Mobile.disabled=true;
    document.f1.mob.disabled=true;
    document.f1.OTP.disabled=false;
    document.f1.otpbtn.disabled=false;
}
function initialize()
{
    if(sessionStorage.length!=0)
    {
        //When The Page Has Been Reloaded
        OTPSendSuccessfully();
        resetOTP(120000);
    }
}
function VerifyNumber()
{
    var mob=document.f1.Mobile.value;
    mob=mob.trim();
    if(mob.length==0)
    {
        document.getElementById("mob_err").innerHTML="Please Enter A Mobile Number";
        return false;
    }
    else if(mob.length!=10 || mob.search(/[^0-9]/)>=0)
    {
        document.getElementById("mob_err").innerHTML="Invalid Mobile Number";
        return false;
    }
    //Mobile Number Is Ok Till here
    //Now We'll Check Whether It Exists In OUR Db or not
    AjaxObj=new XMLHttpRequest();
    AjaxObj.onreadystatechange=function()
    {
        if(AjaxObj.readyState==4 && AjaxObj.status==200)
        {
            resp=AjaxObj.responseText;
            if(resp.charAt(0)==1)
            {
                document.getElementById("mob_err").innerHTML="<b>Mobile Number Already Registered With Us</b>";
                return false;
            }
            else
            {
                //When To Mobile Number Doesn't Exists In The Database
                var otp=GenerateOTP();
                sessionStorage.setItem('OTP',otp);
                sessionStorage.setItem('mob',mob);
                sendOTP(mob,otp);
            }            
        }
    }
    AjaxObj.open("GET","./utilities/isUnique.php?mob="+mob,true);
    AjaxObj.send(null);
}

function GenerateOTP()
{
    var otp=Math.ceil(Math.random()*999999);
    if(otp<=100000 || otp>999999)
    {
        GenerateOTP();
    }
    return otp;
}

function sendOTP(mob,otp)
{
    //This Function Sends The OTP To The User
    OTPAjax=new XMLHttpRequest();
    OTPAjax.onreadystatechange=function()
    {
        //Thing To Be Done In Here
        if(OTPAjax.status==200 && OTPAjax.readyState==4)
        {
            resp=OTPAjax.responseText;
            if(resp.indexOf("Success")>=0)
            {
                resp=1;
            }
            if(resp==1)
            {
                resetOTP(300000);
                document.getElementById('msg').innerHTML="An OTP Has Been Sent To <font color=green>"+mob+"</font>, And Will Expire In 5 Minutes";
                OTPSendSuccessfully();
            }
            else
            {
                document.getElementById('msg').innerHTML="<font color=red>There Was Some Error Sending The One Time Password On Your Mobile, Please Try Again Later</font>";                    
            }
        }
    }
    OTPAjax.open("GET","./utilities/smsApi.php?mob=91"+mob+"&otp="+otp+"&type=Registartion",true);
    OTPAjax.send(null);
}

function VerifyOTP()
{
    //This Function is to be called When The User Wants To verify The OTP
    var OTP=sessionStorage.getItem('OTP');
    var userOTP=document.f1.OTP.value;
    if(userOTP.length!=6 || userOTP.search(/[^0-9]/)>=0)
    {
        document.getElementById('otp_err').innerHTML="Invalid OTP";
    }
    else if(userOTP!=OTP)
    {
        document.getElementById('otp_err').innerHTML="Please Check The OTP You Have Entered";        
    }
    else if(userOTP==OTP)
    {
        clearInterval(timer);
        window.location="./registration.php";
    }
    else
    {
        alert("You Forgot Some Thing To Cover In Errors");
    }
}
