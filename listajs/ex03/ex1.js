let buttom = document.getElementById("b");
let x = 0
let buttom2 = document.getElementById("b2");
let num = document.getElementById("num")

buttom.addEventListener("click",function(){
    x = x + 1
    num.innerText = x
    console.log(x)
})

buttom2.addEventListener("click",function(){
    if (x > 0){
        x = x - 1
    }
    num.innerText = x
    console.log(x)
})