<?php

require_once ('helper\Read.php');
       
      $leitura = new Read();
      $resultado = $leitura -> exeRead('alunos');

?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link  rel="stylesheet" href = " https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css " >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>

                .button {
                animation-duration: 3s;
                animation-delay: 2s;
                animation-iteration-count: infinite;
                }
    </style>

  </head>
  <body>

<div class="jumbotron jumbotron-fluid  ">
  <div class="container">
    <h1 class="display-10">Lista de Usuário </h1>
    <p class="lead"> Acesse às alterações dos usuários por intermédio do primeiro ícone, e para excluir o ícone da Lixeira</p>
  </div>
</div>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Turma</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>

        <?php
          foreach ($resultado as $value) {
                extract($value);
        ?>
              <tr>
                 <th scope="row"><?php echo $idAluno; ?></th>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $turmaId; ?></td>
                    <td>                  
                        <button type="button" class="btn btn-primary">
                        <i class="material-icons">edit</i></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary">
                          <i class="material-icons">delete</i></button>
                    </td>
              </tr> 
        <?php }  ?>
 </tbody>
</table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>
</html>