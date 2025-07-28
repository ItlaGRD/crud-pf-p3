function mostrar(){

  const btnCheckBox = document.querySelector(".form-check-input");
  const inputContra = document.getElementById("contraseña");

  inputContra.type = btnCheckBox.checked ? "text" : "password";
}


function acceder(){
    const usuario = document.getElementById("usuario").value;
    const contra = document.getElementById("contraseña").value;

    if(usuario == "admin" && contra == "admin"){
        window.location.href = "#!";
    } else{
        alert("Usuario o Contraseña invalido ");
    }

}

