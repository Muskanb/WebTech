function getcoord(event){
    const container=document.getElementById('container');
    const h2=document.getElementById('h2')
    container.addEventListener('mousemove',(evt)=>{
        const x=evt.clientX;
        const y=evt.clientY;
        h2.innerText=`X:${x} Y:${y}`;
    })
    
}

getcoord()


