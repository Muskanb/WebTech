function newwindow(){
    const window=open();
    const header=document.createElement("h1");
    header.innerText="The secret is within you!";
    window.document.body.appendChild(header);
    
}