async function removerLivro (elemento){    
    var elementoRemover = document.querySelector("#"+elemento);
    elementoRemover.remove();    
    await removerLivroBanco(elemento.substring(1,elemento.length));    
    console.log(elemento);
}

async function removerLivroBanco(idElemento){
    await fetch('http://localhost:8080/deleteLivro.php?id='+idElemento, {
        method: 'DELETE'})
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    });    
}

async function atualizarLivro(elemento){
    var elementoAtualizar = document.querySelector("#"+elemento);
    var descricao = elementoAtualizar.querySelector(".valor-descricao");
    var titulo = elementoAtualizar.querySelector(".valor-titulo");
    var autor = elementoAtualizar.querySelector(".valor-autor");
    console.log(descricao.value, titulo.value, autor.value);
    await atualizarLivroBanco(elemento.substring(1,elemento.length), descricao.value, titulo.value, autor.value);
}

async function atualizarLivroBanco(id, descricao, titulo, autor){
    await fetch('http://localhost:8080/updateLivro.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": id,
            "descricao": descricao,
            "titulo": titulo,
            "autor": autor,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}

async function salvarLivro(descricao, titulo, autor){
    await fetch('http://localhost:8080/saveLivro.php', {
        //define qual arquivo vai processar esse metodo
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({ // define quais dados do "objeto"
                               //  serão colocados para o json       
            "descricao": descricao,
            "titulo": titulo,
            "autor": autor
        })
    })
    .then((response) => {
        if (!response.ok) { //se a resposta esta entre 200-299 
            throw new Error(`HTTP error! Status: ${response.status}`);
                            //status coloca o codigo http para o console
        }
        return response.json();
        // Parse the response body as JSON
    })
    .then((data) => {
        console.log('Data fetched:', data);
        // Work with the parsed JSON data
    })
    .catch((error) => {
        console.error('Fetch error:', error);
        // Display an error message to the user
    });
}

function validarFormulario(form){
    var camposInvalidos = [];
    for (let i = 0; i < form.target.elements.length; i++) {
        const element = form.target.elements[i];
        if (element.name && element.type !== 'submit') {
            if(!element.value || element.value.trim() === '') {
                camposInvalidos.push(element.name);
            }
        }
    }
    return camposInvalidos;
}

const formElement = document.querySelector('#form-livro'); 
if(formElement) {
    formElement.addEventListener('submit', async function(event) {
        event.preventDefault();
        const formData = new FormData(event.target);
        var erros = validarFormulario(event);    
        
        if(erros.length > 0){
            alert('Campos obrigatórios não preenchidos: ' + erros.join(', '));
            return;
        } 
        
        const descricao = formData.get("descricao");
        const titulo = formData.get("titulo");
        const autor = formData.get("autor");
        
        await salvarLivro(descricao, titulo, autor);
        
        // Recarregar a página para mostrar o novo registro
        window.location.reload();
    });
}

const formElementt = document.querySelector('#form-local'); 
if(formElementt) {
    formElementt.addEventListener('submit', async function(event) {
        event.preventDefault();
        const formData = new FormData(event.target);
        var erros = validarFormulario(event);    
        
        if(erros.length > 0){
            alert('Campos obrigatórios não preenchidos: ' + erros.join(', '));
            return;
        } 
        
        const nome = formData.get("nome");
        const cep = formData.get("cep");
        const endereco = formData.get("endereco");
        
        await salvarLocal(nome, cep, endereco);
        
        // Recarregar a página para mostrar o novo cadastro
        window.location.reload();
    });
}

// Funções do local
async function removerLocal (elemento){    
    var elementoRemover = document.querySelector("#"+elemento);
    elementoRemover.remove();    
    await removerLocalBanco(elemento.substring(1,elemento.length));    
    console.log(elemento);
}

async function removerLocalBanco(idElemento){
    await fetch('http://localhost:8080/deleteLocal.php?id='+idElemento, {
        method: 'DELETE'})
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
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
    var nome = elementoAtualizar.querySelector(".valor-nome");
    var cep = elementoAtualizar.querySelector(".valor-cep");
    var endereco = elementoAtualizar.querySelector(".valor-endereco");
    console.log(nome.value, cep.value, endereco.value);
    await atualizarLocalBanco(elemento.substring(1,elemento.length), nome.value, cep.value, endereco.value);
}

async function atualizarLocalBanco(id, nome, cep, endereco){
    await fetch('http://localhost:8080/updateLocal.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": id,
            "nome": nome,
            "cep": cep,
            "endereco": endereco,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}

async function salvarLocal(nome, cep, endereco){
    await fetch('http://localhost:8080/saveLocal.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "nome": nome,
            "cep": cep,
            "endereco": endereco,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}

async function salvarItem(localId, livroId, dataEntrada){
    await fetch('http://localhost:8080/saveItem.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "localId": localId,
            "livroId": livroId,
            "dataEntrada": dataEntrada,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}





//LISTAGEMMM

async function pegarLocal(id, nome, cep, endereco){
    await fetch('http://localhost:8080/listarLocal.php', {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": id,
            "nome": nome,
            "cep": cep,
            "endereco": endereco,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}

async function pegarLivro(id, descricao, titulo, Autor){
    await fetch('http://localhost:8080/listarLivro.php', {
        method: 'PUT',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify({
            "id": id,
            "descricao": Descricao,
            "titulo": Titulo,
            "autor": autor,
        })
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        console.log('Data fetched:', data);
    })
    .catch((error) => {
        console.error('Fetch error:', error);
    }); 
}

async function fetchLivrosAndRenderTable() {
  try {
    const response = await fetch('listarLivros.php');
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const livros = await response.json();

    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    livros.forEach(livro => {
      const row = document.createElement('tr');

      const cellId = document.createElement('td');
      cellId.textContent = livro.id; // Ajuste conforme o nome do campo
      row.appendChild(cellId);

      const cellTitulo = document.createElement('td');
      cellTitulo.textContent = livro.titulo; // Ajuste conforme o nome do campo
      row.appendChild(cellTitulo);

      const cellAutor = document.createElement('td');
      cellAutor.textContent = livro.autor; // Ajuste conforme o nome do campo
      row.appendChild(cellAutor);

      const cellEditora = document.createElement('td');
      cellEditora.textContent = livro.editora; // Ajuste conforme o nome do campo
      row.appendChild(cellEditora);

      tableBody.appendChild(row);
    });
  } catch (error) {
    console.error('Erro ao buscar ou renderizar livros:', error);
  }
}

fetchLivrosAndRenderTable();