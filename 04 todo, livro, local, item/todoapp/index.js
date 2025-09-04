async function removerLivro (elemento){    
    var elementoRemover = document.querySelector("#"+elemento);
    elementoRemover.remove();    
    await removerBanco(elemento.substring(1,elemento.length));    
    console.log(elemento);
}

async function removerBancoLivro(idElemento){
    await fetch('http://localhost:8080/deleteLivro.php?id='+idElemento, {
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

async function removerLocal (elemento){    
    var elementoRemover = document.querySelector("#"+elemento);
    elementoRemover.remove();    
    await removerBanco(elemento.substring(1,elemento.length));    
    console.log(elemento);
}

async function removerBancoLocal(idElemento){
    await fetch('http://localhost:8080/deleteLocal.php?id='+idElemento, {
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

async function atualizarLocal(elemento){
    var elementoAtualizar = document.querySelector("#"+elemento);
    var Nome = elementoAtualizar.querySelector(".local-Nome");
    var CEP = elementoAtualizar.querySelector(".local-CEP");
    var Endereco = elementoAtualizar.querySelector(".local-Endereco");
    console.log("Descrição encontrada:", descricao.value);
    await atualizarBanco(elemento.substring(1,elemento.length), descricao.value);
}

async function atualizarLivro(elemento){
    var elementoAtualizar = document.querySelector("#"+elemento);
    var   = elementoAtualizar.querySelector(".valor-descricao");
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

async function salvarLocal(nome, cep, endereco){
    await fetch('http://localhost:8080/saveLocal.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({            
            "nome":nome,
            "cep":cep,
            "endereco":endereco
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        console.log(response);
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });
}

async function salvarLivro(Titulo, Autor, Descricao){
    await fetch('http://localhost:8080/saveLivro.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({            
            "Titulo":Titulo,
            "Autor":Autor,
            "Descricao":Descricao
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        console.log(response);
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });
}

function validarFormularioLocal(form){
    var camposInvalidos = [];
     for (let i = 0; i < form.target.elements.length; i++) {
        const element = form.target.elements[i];
        if (element.name && element.value) {
            if(element.value == null || element.value == undefined || element.value == null)
                camposInvalidos.push(element.name);
        }
    }
    return camposInvalidos;
}


function validarFormularioLivro(form){
    var camposInvalidos = [];
     for (let i = 0; i < form.target.elements.length; i++) {
        const element = form.target.elements[i];
        if (element.name && element.value) {
            if(element.value == null || element.value == undefined || element.value == null)
                camposInvalidos.push(element.name);
        }
    }
    return camposInvalidos;
}

const formElement = document.querySelector('#form-local'); 
formElement.addEventListener('local.submit', async function(event) {
    // Prevent the default form submission
    event.preventDefault();
    const formData = new FormData(event.target); // event.target refers to the form
    var erros = validarFormulario(event);    
    if(erros.length > 0){
        alert(erros);
        //se o formulário não for válido, irá parar a operação por aqui e mostrar os 
        //campos pendentes de preenchimento
        return;
    } 
    console.log(formData.get("Nome, CEP, Endereco"));

    //segue para enviar para o back-end
    await salvarLocal(formData.get("Nome, CEP, Endereco"));
});

const formElementLivro = document.querySelector('#form-Livro'); 
formElement.addEventListener('livro.submit', async function(event) {
    // Prevent the default form submission
    event.preventDefault();
    const formData = new FormData(event.target); // event.target refers to the form
    var erros = validarFormulario(event);    
    if(erros.length > 0){
        alert(erros);
        //se o formulário não for válido, irá parar a operação por aqui e mostrar os 
        //campos pendentes de preenchimento
        return;
    } 
    console.log(formData.get("Descricao, Titulo, Autor"));

    //segue para enviar para o back-end
    await salvarTodo(formData.get("Descricao, Titulo, Autor"));
});

// Exemplo de como usar as funções:
// Para salvar: salvarPessoa('João Silva', '12345678901', 'Rua das Flores, 123');
// Para atualizar: atualizarPessoa(1, 'João Silva Santos', '12345678901', 'Rua das Rosas, 456');