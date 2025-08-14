async function removerTodo (elemento){    
    var elementoRemover = document.querySelector("#"+elemento);
    elementoRemover.remove();    
    await removerBanco(elemento.substring(1,elemento.length));    
    console.log(elemento);
}

async function removerBanco(idElemento){
    await fetch('http://localhost:8080/delete.php?id='+idElemento, {
        method: 'DELETE'})
    .then((response) => {
        if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
        }
        console.log(response.text);
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });    
}

async function atualizarTodo(elemento){
    var elementoAtualizar = document.querySelector("#"+elemento);
    var nome = elementoAtualizar.querySelector(".valor-nome");
    var cpf = elementoAtualizar.querySelector(".valor-cpf");
    var endereco = elementoAtualizar.querySelector(".valor-endereco");

    console.log(nome.value, cpf.value, endereco.value);
    await atualizarBanco(elemento.substring(1,elemento.length), nome.value, cpf.value, endereco.value);
}

async function atualizarBanco(idElemento, nome, cpf, endereco){
    await fetch('http://localhost:8080/update.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "idpessoa":idElemento,
            "nome":nome,
            "cpf":cpf,
            "endereco":endereco

        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        console.log(response.json());
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });  
}