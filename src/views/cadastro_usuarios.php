<?php include "header.php";?>

<body>
  <script src="static/js/jquery.js"></script>
  <div>
    <form method="post" id="lista_usuarios" class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <div>
        <label>Nome</label>
        <input type="text" name="nome" required class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Login</label>
        <input type="text" name="user" required class="w3-input w3-block w3-border">
      </div>

      <div>
        <label>Senha</label>
        <input type="password" name="pass" required class="w3-input w3-block w3-border">
      </div>

      <fieldset>
        <legend>Permissões</legend>
        <div>
          <input type="checkbox" id="criarEditar" value="cadastrar_clientes" name="authorization[]" checked>
          <label for="criarEditar">Criar/Editar usuários</label>
        </div>
        <div>
          <input type="checkbox" id="deletar" value="excluir_clientes" name="authorization[]" checked>
          <label for="deletar">Deletar usuários</label>
        </div>
      </fieldset>

      <fieldset>
        <legend>Status</legend>
        <div>
          <input type="radio" id="ativo" value="S" name="status" checked>
          <label for="ativo">Ativo</label>
        </div>
        <div>
          <input type="radio" id="inativo" value="N" name="status" >
          <label for="inativo">Inativo</label>
        </div>
      </fieldset>

      <button value="submit" style="background-color: green !important;" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
      <a href="/pesquisa_usuarios" class="w3-button w3-theme w3-margin-top w3-margin-bottom w3-right">Cancelar</a>

    </form>
  </div>
</body>

</html>