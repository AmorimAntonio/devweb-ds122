function changeBodyColor(color){
    document.body.style.backgroundColor = color;
}

const buttons = document.getElementsByClassName("bts");

let b4 = document.getElementById("b4");

for(let i = 0; i < buttons.length; i++){
    buttons[i].addEventListener("click", function(){
        console.log(this.dataset.color)
        changeBodyColor(this.dataset.color);
    });
}

b4.addEventListener("click",function(){
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    changeBodyColor(`rgb(${r},${g},${b})`);
})