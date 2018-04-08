function createXMLHTTPRequestObject()
{
    {
        var x=false;
        if(x=new XMLHttpRequest())
        {
            //Object Created
        }
        else
        {
            //console.log("ActiveX Object Created");
            x=new ActiveXObject('Microsoft.XMLHTTP');
        }
    }
    return x;
}

function validate()
{
    //Checking the First Name
    val=document.f1.FirstName.value;
    document.getElementById('submit').disabled=true;            //Disable The Submit Button While The Values Are Being Validated
    if(val.length==0)
    {
        //document.getElementById('FirstName').focus();
        return false;
    }
    
    else if(val.search(/[0-9]/i)>=0)
    {   
        //document.getElementById('FirstName').focus();
        return false;
    }

    //Checking The Last Name
    
    val=document.f1.LastName.value;
    
    if(val.length==0)
    {
        //document.getElementById('LastName').focus();
        return false;
    }
    else if(val.search(/[0-9]/i)>=0)
    {   
        //document.getElementById('LastName').focus();
        return false;
    }

    val=document.f1.Address.value;
    
    if(val.length==0)
    {
        //document.getElementById('Address').focus();
        return false;
    }
    
    //Validate The Pincode Things Here
    
    val=document.f1.pincode.value;
    
    if(val.length!=6)
    {
        //document.getElementById('pincode').focus();
        return false;
    }
    
    else if(document.getElementById('pincode_err').innerHTML.length!=0)
    {
        //That Means An Error In The Pincode Is There
        return false;
    }
    else if(document.f1.city.value=="Invalid")
    {
        document.getElementById('pincode_err').innerHTML="Invalid Pincode";
        return false;
    }
    //Validating The Mobile Number
    
    val=document.f1.Mobile.value;
    
    if(val.length!=10)
    {
        //document.getElementById('Mobile').focus();
        return false;
    }
    else if(val.search(/[^0-9]/i)>=0)
    {   
        //document.getElementById('Mobile').focus();
        return false;
    }
    else if(document.getElementById('Mobile_err').innerHTML.length!=0)
    {
        //Duplication In The Mobile Number Is There
        return false;
    }
    
    //Check The Email Address
    
    
    val=document.f1.Email.value;
    mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if(val.length==0)
    {
        //document.getElementById('Email').focus();
        return false;
    }
    else if(!(val.match(mailformat)))
    {
        //inValid Email Format
        return false;
    }
    else if(document.getElementById('Email_err').innerHTML.length!=0)
    {
        //Condition For Checking The Uniqueness of All Email
        return false;
    }
    
    //Validate The Username
    errcode=document.getElementById('User_err').innerHTML;
    
    val=document.f1.User.value;
    if(val.length<6 && val.search(/[a-z]/i)<0)
    {
        //Username Is inValid And Has numbers and alphabets Both
        return false;
    }
    else if(errcode.length>0)
    {
        //Error in the username error field
        return false;
    }

    //Validating the Passwords
    
    val=document.f1.Password.value;
    
    if(val.length<8)
    {
        //document.getElementById('Password').focus();
        return false;
    }
    
    else if(true)
    {
        //The Regex Test For The Password Fields
        status=true;
        if(val.length<8)
        {
            //Length Error
            status=false;
        }
        else if(val.search(/[a-z]/)<0)
        {
            //Lower Case Test
            status=false;
        }
        else if(val.search(/[A-Z]/)<0)
        {
            //Upper Case Test
            status=false;
        }
        else if(val.search(/[0-9]/)<0)
        {
            //Number Test
            status=false;
        }
        else if(val.search(/[#?!@$%^&*+=~`<>,._-]/)<0)
        {
            //Symbol Test
            status=false;
        }
        if(status==false)
        {
            //document.getElementById('Password').focus();
            return false;
        }
    }
    
    cpass=document.f1.cPassword.value;
    if(val!=cpass)
    {
        //Case When Both The Password Don't Match
        return false;
    }
    val=document.f1.tnc.checked;
    if(!val)
    {
        document.getElementById('tnc').focus();
        return false;
    }
    //Validation Successfull Enable The Register Button
    document.getElementById('submit').disabled=false;
}

var prevpincode=null;

function getPincode()
{
    var pincode=document.getElementById('pincode').value;
    pincodeAjaxObj=createXMLHTTPRequestObject();
    pincodeAjaxObj.onreadystatechange=function()
    {
        if(pincodeAjaxObj.readyState==4 && pincodeAjaxObj.status==200)
        {
            var resp=pincodeAjaxObj.responseText;
            resp=resp.split(',');
            if(resp[0]==0)
            {
                //Condition When Pincode Is Found Successfully
                resp=resp[1].split('&');
                document.f1.city.value=resp[0];
                document.f1.state.value=resp[1];
            }
            else
            {
                //Condition When Pincode Is not Found
                document.f1.city.value="Invalid";
                document.f1.state.value="Invalid";
            }
            validate();
        }
    }
    if(pincode.search(/[^0-9]/i)<0 && pincode.length==6)
    {
        if(prevpincode!=pincode)
        {
            document.f1.city.value="";
            document.f1.state.value="";
            pincodeAjaxObj.open("GET","utilities/getLocation.php?pc="+pincode,true);
            pincodeAjaxObj.send(null);
        }
    }
    else
    {
        document.f1.city.value="Invalid";
        document.f1.state.value="Invalid";
        document.getElementById('pincode_err').innerHTML="Invalid Pincode";
    }
    prevpincode=pincode;
}

function isUnique(id,type)
{
    var val=document.getElementById(id).value;
    isUniqueCheck=createXMLHTTPRequestObject();
    isUniqueCheck.open("GET","utilities/isUnique.php?"+type+"="+val,true);
    isUniqueCheck.send(null);
    isUniqueCheck.onreadystatechange=function()
    {
        if(isUniqueCheck.status==200 && isUniqueCheck.readyState==4)
        {
            resp=isUniqueCheck.responseText;
            resp=resp.split(',');
            if(resp[0]=='1')
            {
                //Means Value Already Exists In The DataBase
                document.getElementById(resp[1]).innerHTML=resp[2];
            }
            validate();
        }
    }
}

function clearErrorField(id)
{
    document.getElementById(id+"_err").innerHTML="";
}