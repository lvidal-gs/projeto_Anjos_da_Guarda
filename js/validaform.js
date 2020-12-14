document.getElementById("senha").addEventListener("click", validar);

function validar(){
    var ele = document.getElementById("errosenha");
    var senha = form.senha.value;
    var senha_confirma = form.senha_confirma.value;

    if(senha == "" || senha.length <= 5){
        ele.style.display = "block"
		ele.innerHTML = "Preencha o campo senha com no mínimo 6 caracteres."
        form.senha.focus();
        return false;
    }

    if(senha_confirma == "" || senha_confirma.length <= 5){
        ele.style.display = "block"
		ele.innerHTML = ('Preencha o campo senha com no mínimo 6 caracteres.');
        form.senha.focus();
        return false;
    }

    if( senha != senha_confirma){
        ele.style.display = "block"
		ele.innerHTML = ('As senhas colocadas são diferentes.');
        form.senha_confirma.focus();
        return false;
    }

}
