const baseUrl = document.getElementById('hddBaseUrl').value;

const inputClube = document.getElementById('somCurso');
const inputDisciplina = document.getElementById('somDisciplina');

buscarDisciplinas();
function buscarDisciplinas() {
    //Remover os options já existentes no select de disciplina
    while(inputDisciplina.children.length > 0) {
        inputDisciplina.children[0].remove();
    }

    //Criar option vazia
    criarOptionDisciplina("---Selecione---", "", "--");

    var idSelecionado = 
            inputDisciplina.getAttribute("idSelecionado");

    //Requisição AJAX
    var xhttp = new XMLHttpRequest();
    
    var url = baseUrl + "/api/listar_por_curso.php" + 
                            "?idCurso=" + inputCurso.value;
    xhttp.open("GET", url);

    //Funcão de retorno executada após a 
    //resposta do servidor chegar no cliente
    xhttp.onload = function() {
        //Resposta da requisição
        console.log("Resposta recebida do servidor!");

        var json = xhttp.responseText;
        var disciplinas = JSON.parse(json);

        disciplinas.forEach(disc => {
            //Criar as opções para o select (tags <option>)
            //console.log(disc.codigo);
            criarOptionDisciplina(disc.nome, disc.id, idSelecionado);
        });
    }

    xhttp.send();
    console.log("Requisição enviada ao servidor!");
    console.log("Requisição enviada ao servidor - outra mensagem!");
    console.log("Requisição enviada ao servidor - mais uma mensagem!");
}

function criarOptionDisciplina(desc, valor, valorSelecionado) {
    var option = document.createElement("option");
    option.innerHTML = desc;
    option.setAttribute("value" , valor);
    
    if(valor == valorSelecionado)
        option.selected = true;
    
    inputDisciplina.appendChild(option);
}