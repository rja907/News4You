function initialize()
{
    if(sessionStorage.length!=0)
    {
        document.f1.Mobile.value=sessionStorage.getItem('mob');
        document.f1.Mobile.readOnly=true;
    }
}