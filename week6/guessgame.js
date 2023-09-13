function generateNumber(){
    const num=Math.floor(Math.random()*5+1);
    return num;
}
function getId(id){
    console.log(id);
    const guess=Number(id)
    // console.log(typeof(id));
    const num=generateNumber();
    if(num===guess){
        alert('You Won!')
    }
    else{
        alert('You lose :(')
    }
}
