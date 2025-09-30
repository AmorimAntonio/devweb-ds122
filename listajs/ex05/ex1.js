let email = document.getElementById("email")
let names = document.getElementById("name")
let password = document.getElementById("password")

//paragrafos das mensagens
let emailv = document.getElementById("emailv")
let namev = document.getElementById("namev")
let passwordv = document.getElementById("passwordv")

names.addEventListener("keyup",function(){

  if(names.value == ""){
    let erroname = document.createElement("span")
    erroname.textContent = "O nome não pode estar vazio"
    erroname.style.color = "Red"
    
    namev.innerText = ""
    namev.appendChild(erroname);

  }
  
  else{
    let erroname = document.createElement("span")
    erroname.textContent = "Nome válido"
    erroname.style.color = "Green"

    namev.innerText = ""
    namev.appendChild(erroname);

  }

 
})





email.addEventListener("keyup",function(){

  if(email.value.includes("@")){

    let erroname = document.createElement("span")
    erroname.textContent = "Email válido"
    erroname.style.color = "Green"

    emailv.innerText = ""
    emailv.appendChild(erroname);


  }
  
  else{
    let erroname = document.createElement("span")
    erroname.textContent = "Email inválido"
    erroname.style.color = "Red"
    
    emailv.innerText = ""
    emailv.appendChild(erroname);

  }

 
})





password.addEventListener("keyup",function(){

  if(password.value.length < 8){
    let erroname = document.createElement("span")
    erroname.textContent = "A senha deve ter pelo menos 8 caracteres"
    erroname.style.color = "Red"
    
    passwordv.innerText = ""
    passwordv.appendChild(erroname);

  }
  
  else{
    let erroname = document.createElement("span")
    erroname.textContent = "Senha válida"
    erroname.style.color = "Green"

    passwordv.innerText = ""
    passwordv.appendChild(erroname);

  }

 
})