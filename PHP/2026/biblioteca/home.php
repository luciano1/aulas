<?php

// Inclui o arquivo responsável por verificar
// se o usuário está autenticado.
require_once "proteger.php";

// Tenta recuperar o cookie categoria_favorita.
//
// Caso o cookie ainda não exista,
// a variável receberá uma string vazia.
$categoriaFavorita = $_COOKIE["categoria_favorita"] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <title>Sistema de Biblioteca</title>
</head>

<body>

    <h1>Sistema de Biblioteca</h1>

    <!--
        Mostra o nome do usuário salvo na sessão.

        htmlspecialchars() impede que um conteúdo seja
        interpretado como HTML pelo navegador.
    -->
    <p>
        Bem-vindo,

        <strong>
            <?= htmlspecialchars($_SESSION["usuario"]) ?>
        </strong>
    </p>

    <!-- Menu principal do sistema -->

    <a href="cadastro_livro.php">
        Cadastrar livro
    </a>

    <br><br>

    <a href="logout.php">
        Sair
    </a>

    <hr>

    <h2>Preferência de leitura</h2>

    <?php if (!empty($categoriaFavorita)) { ?>

        <!--
            Este bloco será executado quando
            o cookie possuir uma categoria.
        -->

        <p>
            Sua categoria favorita é:

            <strong>
                <?= htmlspecialchars($categoriaFavorita) ?>
            </strong>
        </p>

    <?php } else { ?>

        <!--
            Este bloco será executado quando
            o cookie ainda não existir.
        -->

        <p>
            Você ainda não escolheu uma categoria favorita.
        </p>

    <?php } ?>

    <!--
        O formulário envia a categoria escolhida
        para salvar_preferencia.php utilizando POST.
    -->

    <form
        action="salvar_preferencia.php"
        method="POST"
    >

        <label for="categoria">
            Escolha sua categoria favorita:
        </label>

        <br><br>

        <select
            id="categoria"
            name="categoria"
            required
        >

            <option value="">
                Selecione uma categoria
            </option>

            <!--
                O operador ternário verifica se essa opção
                é igual ao valor salvo no cookie.

                Caso seja igual, adiciona o atributo selected.
            -->

            <option
                value="Tecnologia"
                <?= $categoriaFavorita == "Tecnologia"
                    ? "selected"
                    : "" ?>
            >
                Tecnologia
            </option>

            <option
                value="História"
                <?= $categoriaFavorita == "História"
                    ? "selected"
                    : "" ?>
            >
                História
            </option>

            <option
                value="Romance"
                <?= $categoriaFavorita == "Romance"
                    ? "selected"
                    : "" ?>
            >
                Romance
            </option>

            <option
                value="Didático"
                <?= $categoriaFavorita == "Didático"
                    ? "selected"
                    : "" ?>
            >
                Didático
            </option>

        </select>

        <br><br>

        <button type="submit">
            Salvar preferência
        </button>

    </form>

    <!--
        O link para remover a preferência
        só será exibido se o cookie existir.
    -->

    <?php if (!empty($categoriaFavorita)) { ?>

        <br>

        <a href="remover_preferencia.php">
            Remover preferência
        </a>

    <?php } ?>

</body>

</html>