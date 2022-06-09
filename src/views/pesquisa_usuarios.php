<?php include "header.php";?>

    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
  <body>
    <script src="static/js/jquery.js"></script>
    <div>
      <div id="lista_usuarios" class="w3-margin">
        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        <a href='/logout' style='margin-left: 1%;'class='w3-button w3-theme w3-margin-top w3-right'>Deslogar</a>
        <a href="/cadastro_usuarios" class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</a>

        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($array as $arr){
                echo "<tr>";
                  echo "<td>".$arr["NOME_COMPLETO"]."</td>";
                  echo "<td>".$arr["LOGIN"]."</td>";
                  echo "<td>".$arr["ATIVO"]."</td>";
                  echo "<td>";
                  echo "<a href='/deletar_usuarios?id=".$arr["USUARIO_ID"]."' class='w3-button w3-theme w3-margin-top'><i class='fas fa-user-times'></i></a> ";
                  echo "<a href='/editar_usuarios?id=".$arr["USUARIO_ID"]."' class='w3-button w3-theme w3-margin-top'><i class='fas fa-edit'></i></a>";
                  echo "</td>";
                echo "</tr>";
              }
              ?>
          </tbody>
        </table>

      </div>
    </div>
  </body>
  <script>
  </script>
</html>