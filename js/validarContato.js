function validaContato(){
    let nome = form.nome.value;
    let email = form.email.value;
    let assunto = form.assunto.value;
    let mensagem = form.mensagem.value;

    if(nome == "" || email =="" || assunto== "" || mensagem==""){
        alert('Preencha todos os campos')
        return false;
    }else{
        alert('Mensagem enviada com sucesso!');
    }
    return true;
}
