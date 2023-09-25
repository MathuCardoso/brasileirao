<?php
//Formulário para jogadores

require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../include/header.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();

?>

<h2 class="text-center mt-4"><?php echo (!$jogador || $jogador->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Jogador</h2>

<style>
    body::-webkit-scrollbar {
        display: none;
    }
</style>

<form id="formJogador" method="POST" class="row g-3 mt-2 needs-validation">

    <!--Nome do Jogador-->
    <div class="col-md-6">
        <label for="txtNomeJogador" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$nomeJogador) {
                    echo "<p class='mb-0 fw-bold text-danger'>Nome do jogador:</p>";
                } elseif (strlen($nomeJogador) <= 2) {
                    echo "<p class='mb-0 fw-bold text-danger'>Isso é realmente um nome?</p>";
                } elseif ($nomeJogador) {
                    echo "<p class='mb-0 fw-bold text-success'>$nomeJogador</p>";
                }
            } else echo "Nome do jogador:";
            ?></label>
        <br>
        <input placeholder="Nome completo do jogador" type="text" name="nomeJogador" class="form-control fs-5" id="txtNomeJogador" value="<?php echo ($jogador ? $jogador->getNomeJogador() : ''); ?>" />
    </div>

    <!--Nome no uniforme-->
    <div class="col-md-6">
        <label for="nomeUniforme" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$nomeUniforme) {
                    echo "<p class='mb-0 fw-bold text-danger'>Nome no uniforme:</p>";
                } elseif ($nomeUniforme) {
                    echo "<p class='mb-0 fw-bold text-success'>$nomeUniforme</p>";
                }
            } else echo "Nome no uniforme:";
            ?></label>
        <br>
        <input placeholder="Nome que o jogador usará no uniforme" type="text" name="nome_uniforme" class="form-control fs-5" id="nomeUniforme" value="<?php echo ($jogador ? $jogador->getNomeUniforme() : ''); ?>" />
    </div>

    <!--Altura-->
    <div class="col-md-6">
        <label for="altura" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$altura) {
                    echo "<p class='mb-0 fw-bold text-danger'>Altura:</p>";
                } elseif ($altura < 140) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador baixo de mais.</p>";
                } elseif ($altura > 220) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador alto de mais.</p>";
                } elseif ($altura) {
                    echo "<p class='mb-0 fw-bold text-success'>" . $altura . "cm" . "</p>";
                }
            } else echo "Altura:";
            ?></label>
        <br>
        <input placeholder="Altura do jogador em cm. Ex: 178" type="number" name="altura" class="form-control fs-5" id="altura" value="<?php echo ($jogador ? $jogador->getAltura() : ''); ?>" />
    </div>

    <!--Peso-->
    <div class="col-md-6">
        <label for="peso" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$peso) {
                    echo "<p class='mb-0 fw-bold text-danger'>Peso:</p>";
                }elseif ($jogador->getPeso() < 50) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador leve de mais.</p>";
                } elseif ($peso > 190) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador pesado de mais.</p>";
                } elseif ($peso) {
                    echo "<p class='mb-0 fw-bold text-success'>" . $peso . "kg" . "</p>";
                }
            } else echo "Peso:";
            ?></label>
        <br>
        <input placeholder="Peso do jogador em kg. Ex: 76" type="number" name="peso" class="form-control fs-5" id="peso" value="<?php echo ($jogador ? $jogador->getPeso() : ''); ?>" />
    </div>

    <!--Idade-->
    <div class="col-md-3">
        <label for="txtNascimento" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$idade) {
                    echo "<p class='mb-0 fw-bold text-danger'>Idade:</p>";
                } else if ($idade < 15) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador muito novo.</p>";
                } else if ($idade > 50) {
                    echo "<p class='mb-0 fw-bold text-danger'>Jogador velho de mais.</p>";
                } elseif ($idade) {
                    echo "<p class='mb-0 fw-bold text-success'>$idade Anos de idade</p>";
                }
            } else echo "Idade:";
            ?></label>
        <br>
        <input placeholder="Idade do jogador" type="number" name="idade" class="form-control fs-5" id="idade" value="<?php echo ($jogador ? $jogador->getIdade() : ''); ?>">
    </div>

    <!--Número-->
    <div class="col-md-3">
        <label for="selNumero" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$numero) {
                    echo "<p class='mb-0 fw-bold text-danger'>Número:</p>";
                } elseif ($numero < 1 || $numero > 99) {
                    echo "<p class='mb-0 fw-bold text-danger'>Números entre 1 e 99.</p>";
                } elseif (count($camisaIgual) > 0) {
                    echo "<p class='mb-0 fw-bold text-danger'>Escolha outro número.</p>";
                } elseif ($numero) {
                    echo "<p class='mb-0 fw-bold text-success'>Camisa $numero</p>";
                }
            } else echo "Número";
            ?></label>
        <br>
        <input placeholder="Número do jogador" type="number" name="numero" class="form-control fs-5" id="numero" value="<?php echo ($jogador ? $jogador->getNumero() : ''); ?>">
    </div>

    <!--Pé-->
    <div class="col-md-3">
        <label for="pe" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$pe) {
                    echo "<p class='mb-0 fw-bold text-danger'>Pé:</p>";
                } elseif ($pe) {
                    echo "<p class='mb-0 fw-bold text-success'>$pe</p>";
                }
            } else echo "Pé";
            ?></label>
        <br>
        <select id="pe" name="pe" class="form-select fs-6">
            <option value="" selected></option>

            <option value="Direito" <?php echo ($jogador && $jogador->getPe() == 'Direito' ? 'selected' : ''); ?>>
                Direito</option>

            <option value="Esquerdo" <?php echo ($jogador && $jogador->getPe() == 'Esquerdo' ? 'selected' : ''); ?>>
                Esquerdo</option>

            <option value="Ambidestro" <?php echo ($jogador && $jogador->getPe() == 'Ambidestro' ? 'selected' : ''); ?>>
                Ambidestro</option>
        </select>
    </div>

    <!--País-->
    <div class="col-md-3">
        <label for="pais" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$pais) {
                    echo "<p class='mb-0 fw-bold text-danger'>País:</p>";
                } elseif ($pais) {
                    echo "<p class='mb-0 fw-bold text-success'>$pais</p>";
                }
            } else echo "País";
            ?></label>
        <br>
        <input placeholder="País do jogador" type="text" name="pais" class="form-control fs-5" id="pais" value="<?php echo ($jogador ? $jogador->getPais() : ''); ?>" />
    </div>


    <!--Posição-->
    <div class="form-check col-md-6">
        <label class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$posicao) {
                    echo "<p class='mb-0 fw-bold text-danger'>Posição:</p>";
                } elseif ($posicao) {
                    echo "<p class='mb-0 fw-bold text-success'>$posicao</p>";
                }
            } else echo "Posição";
            ?></label>

        <br>
        <input type="radio" name="posicao" class="btn-check" id="ataque" value="Ataque" <?php echo ($jogador && $jogador->getPosicao() == 'Ataque' ? 'checked' : ''); ?>>
        <label for="ataque" class="btn btn-outline-danger mr-2">Ataque</label>

        <input type="radio" name="posicao" class="btn-check" id="meio-campo" value="Meio-Campo" <?php echo ($jogador && $jogador->getPosicao() == 'Meio-Campo' ? 'checked' : ''); ?>>
        <label for="meio-campo" class="btn btn-outline-light mr-2">Meio-Campo</label>

        <input type="radio" name="posicao" class="btn-check" id="defesa" value="Defesa" <?php echo ($jogador && $jogador->getPosicao() == 'Defesa' ? 'checked' : ''); ?>>
        <label for="defesa" class="btn btn-outline-warning mr-2">Defesa</label>

        <input type="radio" name="posicao" class="btn-check" id="gol" value="Goleiro" <?php echo ($jogador && $jogador->getPosicao() == 'Goleiro' ? 'checked' : ''); ?>>
        <label for="gol" class="btn btn-outline-primary mr-2">Goleiro</label>
    </div>

    <!--Clube do jogador-->
    <div class="col-md-6">
        <label for="clube" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$idClube) {
                    echo "<p class='mb-0 fw-bold text-danger'>Clube do jogador:</p>";
                } elseif ($idClube) {
                    echo "<p class='mb-0 fw-bold text-success'>Clube do jogador:</p>";
                }
            } else echo "Clube do jogador";
            ?></label>
        <br>
        <select id="clube" name="id_clube" class="form-select">
            <option value=""></option>

            <?php foreach ($clubes as $clube) : ?>
                <option value="<?= $clube->getId(); ?>"
                 
                <?php

                if ($jogador && $jogador->getClube() && $jogador->getClube()->getId() == $clube->getId())
                echo 'selected'; ?>>

                <?= $clube->getNomeClube(); 
                ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="hidden" name="id" value="<?php echo ($jogador ? $jogador->getId() : 0); ?>" />

    <input type="hidden" name="submetido" value="1">

    <button type="submit" class="btn btn-success col-md-4 mx-auto fs-5">Cadastrar</button>
    <button type="reset" class="btn btn-info col-md-3 mx-auto fs-5">Limpar</button>
    <a href="listar.php" class="btn btn-outline-secondary col-md-3 mx-auto fs-5">Voltar</a>

</form>

<br><br>


<?php require_once(__DIR__ . "/../include/footer.php"); ?>