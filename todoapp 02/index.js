function habilitarCampoParaEdicao(idElemento){
    var linha = document.getElementById(idElemento);
    var input = linha.getElementsById(".entradaDados");
    input.disabled = false;
    console.log(input);
}