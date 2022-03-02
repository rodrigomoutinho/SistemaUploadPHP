<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sistema de UPLOAD em PHP</title>


</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center">Upload de Arquivos</h1>
        <form method ="post" enctype="multipart/form-data" class="m-3">
        <div class="input-group">
  <input type="file" class="form-control" id="arquivo" name="arquivo" aria-describedby="arquivo" aria-label="Upload">
  <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Enviar</button>
</div>

<?php

if(isset($_POST['enviar'])){
   // echo "<pre>";
   // var_dump($_FILES);
    // echo "</pre>";

    //VALIDAÇÕES
    $tamanhoMax = 2397152 //TAMANHO MÁXIMO
    $permitido = array("jpg, "png", "jpeg","pdf","mp4");    
    $extensao = pathinfo($_FILES['arquivo']['name'] , PATHINFO_EXTENSION)

    //verificar se tem tamanho permitido
    if ($_FILES['arquivo']['size'] >= $tamanhoMax){
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        Tamanho Máximo excedido, não sendo possivel realizar o upload"
        </div>';
       
        <div>';
    }else{
    //VERIFICAR SE EXTENSÃO É PERMITIDA
    if(in_array($extensao, $permitido))
    echo //"Permitido"
    $pasta = "imagens/";
    if(!is_dir($pasta)){
        mkdir($pasta,0755);
    }

    // para não sobrescrever arquivos no banco

    $tmp = $_FILES['arquivo'['tmp_name!];
    $novoNome = uniqid().".$extensao";

     if(move_uploaded_file($tmp,$pasta.$novoNome)){
         echo '<div class="alert alert-sucess d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Sucesso:"><use xlink:href="#exclamation-triangle-fill"/></svg>
         Upload realizado com sucesso!
         </div>';

        }else{
         echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Erro:"><use xlink:href="#exclamation-triangle-fill"/></svg>
         Erro: Não foi possível realizar o upload" </div>';

    }else{

        echo '<div class="alert alert-sucess d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Sucesso:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        Erro: Extensão ($extensao) não permitida";
        </div>';

}
}
}

?>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
</body>


</html>