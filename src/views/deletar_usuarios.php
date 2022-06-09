<?php include "header.php";?>

<style>
.center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
}

.center a {
    width: 45%;
    margin: 1%;
}

</style>

<body>
    <div class="center">
        <h2>Você Tem certeza que deseja apagar o usuário: <?php echo"$id"; ?></h2>
        <span>
            <?php echo "<a href='/deletar_usuarios?id=$id&confirmado=1' class='control w3-button w3-theme'>sim</a>"; ?>
            <a href="/pesquisa_usuarios" class="w3-button w3-theme w3-right" >nao</a></span>
    </div>
</body>

