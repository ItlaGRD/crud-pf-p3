function mostrar(){

  const btnCheckBox = document.querySelector(".form-check-input");
  const inputContra = document.getElementById("contraseña");

  inputContra.type = btnCheckBox.checked ? "text" : "password";
}


function acceder(){
    
    const usuario = document.getElementById('usuario').value;
    const contraseña = document.getElementById('contraseña').value;

    fetch('includes/auth.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `usuario=${encodeURIComponent(usuario)}&contraseña=${encodeURIComponent(contraseña)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            
            window.location.href = 'dashboard.php'; // redirige al panel de administración
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

}

