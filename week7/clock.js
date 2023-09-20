function incrmin(){
    const min=document.getElementById('minutes');
    var newno=Number(min.innerText)+1;
    if(newno<10)
    {
        newno="0"+`${newno}`;
    }
    min.innerText=`${newno}`;
}
function incrhrs(){
    const hrs=document.getElementById('hours');
    var newno=Number(hrs.innerText)+1;
    if(newno<10)
    {
        newno="0"+`${newno}`;   
    }
    hrs.innerText=`${newno}`;
}



function settime(){
    setInterval(incrhrs,6000);
    setInterval(incrmin,100);
}

settime()