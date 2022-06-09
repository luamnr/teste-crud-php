<?php include "header.php";?>

<body>
  <script src="static/js/jquery.js"></script>
  <div>
    <form method="post"  id="lista_usuarios" <?php if ($array["editar"]){echo"action='editar_usuarios?id=". $array[0]["USUARIO_ID"] ."'";} ?> class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <div>
        <label>Nome</label>

        <input <?php echo "value='". $array[0]["NOME_COMPLETO"] ."'" ; ?> type="text" name="nome" required class="w3-input w3-block w3-border">
      </div>

      <div>
        <?php if($loginExist){echo "<p style='color:red'>Este nome de login já existe</p>" ;} ?>
        <label>Login</label>
        <input type="text" <?php echo "value='". $array[0]["LOGIN"] ."'" ; ?> name="user" required class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Senha</label>
        <input type="password" <?php echo "value='". $array[0]["SENHA"] ."'" ; ?> name="pass" required class="w3-input w3-block w3-border">
      </div>

      <fieldset>
        <legend>Permissões</legend>
        <div>
          <input type="checkbox" id="criarEditar" value="cadastrar_clientes" name="authorization[]" <?php if(!$array["editar"]){echo"checked";} else if ($array[1] and in_array("cadastrar_clientes", $array[1])){echo "checked";} ?>>
          <label for="criarEditar">Criar/Editar usuários</label>
        </div>
        <div>
          <input type="checkbox" id="deletar" value="excluir_clientes" name="authorization[]" <?php if(!$array["editar"]){echo"checked";} else if ($array[1] and in_array("excluir_clientes", $array[1])){echo "checked";} ?> >
          <label for="deletar">Deletar usuários</label>
        </div>
      </fieldset>
      
      <fieldset>
        <legend>Status</legend>
        <div>
          <input type="radio" id="ativo" value="S" name="status" <?php if(!$array["editar"]){echo"checked";}else if($array[0]["ATIVO"]=="S"){echo"checked";} ?> >
          <label for="ativo">Ativo</label>
        </div>
        <div>
          <input type="radio" id="inativo" value="N" name="status" <?php if($array[0]["ATIVO"]=="N"){echo"checked";}?> >
          <label for="inativo">Inativo</label>
        </div>
      </fieldset>

      <button value="submit" style="background-color: green !important;" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
      <a href="/pesquisa_usuarios" class="w3-button w3-theme w3-margin-top w3-margin-bottom w3-right">Cancelar</a>

    </form>
  </div>
</body>

</html>