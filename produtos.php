<?php
//cabeçalhos para o navegador
   header("Content-Type:application/json");
   header("charset=utf-8");
   //chama a conexão
   include 'db.php';
   //criar uma variavel para receber o método da requisicao
   $method = $_SERVER['REQUEST_METHOD'];
   //cria uma variavel para armazenar os dados enviados do frontend
   $input = json_decode(file_get_contents('php://input'), true, JSON_UNESCAPED_UNICODE);
   //Verifique o metodo requisitado
   switch($method){
    case 'GET'://Caso seja get, faz a consulta
        if(isset($_GET['descProd'])){
            handleGetFiltro($pdo);
        }else if(isset($_GET['idProd'])){
            handleGetFiltroID($pdo);
        }else if(isset($_GET['categoriaProd'])){
            handleGetCategoria($pdo);
        }else{
            handleGet($pdo);
        }
   }
   //função para fazer a consulta sem filtro
   function handleGet($pdo){
    //Criar o SQL para ser executado
   $sql = "SELECT * from tblProdutos";
   //prepara para a execução
   $stmt = $pdo->prepare($sql);
   //executa a consulta na base
   $stmt->execute();
   //variavel para armazenar os resultados
   $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
   //Exibe em formato json
   echo json_encode($result, JSON_UNESCAPED_UNICODE);
   }
?>
