var idsProds=[];
var descProds=[];
var precoProds=[];
var tamanhoProds=[];
var fotoProds=[];
var categoriaProds=[];
//informa ao navegador para chamar a função ao carregar a pagina
window.onload=()=>{
    pesquisaProdutos();
}
//cria a função pesquisaProdutos()
//essa função requisita e carrega os resultados
function pesquisaProdutos(){
    limpa_vetores();
    //faz a requisição a backend
    fetch('http://localhost/devstore/produtos.php')
    //transforma a resposta do servidor
    .then(response=>response.json())
    //manipula os dados e monta a resposta na tela
    .then(data=>{
        //captura as 2 listas de produt
        const divProds = document.getElementById('products-area');
        const divSeen = document.getElementById('products-seen');
        //exclui o conteudo atual
        divProds.replaceChildren();
        divSeen.replaceChildren();
        //estrutura para alimentar os vetores
        for(var i=0;i<data.length;i++){
            //push adiciona um item no final de cada vetor
            idsProds.push(data[i].idProd);
            descProds.push(data[i].descProd);
            precoProds.push(data[i].precoProd);
            categoriaProds.push(data[i].categoriaProd);
            tamanhoProds.push(data[i].tamanhoProd);
            fotoProds.push(data[i].fotoProd);
        }
    })
}
