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
    var descricao = elementoAtualizar.querySelector(".valor-descricao");
    console.log("Descrição encontrada:", descricao.value);
    await atualizarBanco(elemento.substring(1,elemento.length), descricao.value);
}

async function atualizarBanco(idElemento, descricao){
    await fetch('http://localhost:8080/update.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": idElemento,
            "descricao": descricao
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data updated:', data);
        alert('Todo atualizado com sucesso!');
    })
    .catch((error) => {
        console.error('Fetch error:', error);
        alert('Erro ao atualizar todo');
    });  
}

// NOVAS FUNÇÕES ADICIONADAS PARA PESSOA
async function salvarPessoa(nome, cpf, endereco) {
    await fetch('http://localhost:8080/save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "nome": nome,
            "cpf": cpf,
            "endereco": endereco
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Pessoa salva:', data);
        alert('Pessoa salva com sucesso!');
    })
    .catch((error) => {
        console.error('Erro ao salvar pessoa:', error);
        alert('Erro ao salvar pessoa');
    });
}

async function atualizarPessoa(id, nome, cpf, endereco) {
    await fetch('http://localhost:8080/update.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": id,
            "nome": nome,
            "cpf": cpf,
            "endereco": endereco
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Pessoa atualizada:', data);
        alert('Pessoa atualizada com sucesso!');
    })
    .catch((error) => {
        console.error('Erro ao atualizar pessoa:', error);
        alert('Erro ao atualizar pessoa');
    });
}

// Exemplo de como usar as funções:
// Para salvar: salvarPessoa('João Silva', '12345678901', 'Rua das Flores, 123');
// Para atualizar: atualizarPessoa(1, 'João Silva Santos', '12345678901', 'Rua das Rosas, 456');