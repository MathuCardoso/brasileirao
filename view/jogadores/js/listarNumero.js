document.addEventListener("DOMContentLoaded", function () {
    // Ação ao clicar no botão de ordenar
    document.getElementById("ordenarPorNumero").addEventListener("click", function () {
        // Chama o script PHP que retorna a lista de jogadores ordenada por número
        fetch("ordernarPorNumero.php", {
            method: "GET"
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Erro ao carregar jogadores ordenados por número.");
            }
            return response.text();
        })
        .then(data => {
            // Atualiza a div de jogadores com a resposta do script PHP
            document.querySelector(".row").innerHTML = data;
        })
        .catch(error => {
            alert(error.message);
        });
    });
});
