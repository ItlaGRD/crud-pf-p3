function mostrar(){

  const btnCheckBox = document.querySelector(".form-check-input");
  const inputContra = document.getElementById("contraseña");

  inputContra.type = btnCheckBox.checked ? "text" : "password";
}


function log(){
    const usuario = document.getElementById("usuario").value;
    const contra = document.getElementById("contraseña").value;

    if(usuario == "admin" && contra == "admin"){
        window.location.href = "Bienvenido";
    } else{
        console.log("Usuario o Contraseña invalido "+usuario+contra);
    }

}

