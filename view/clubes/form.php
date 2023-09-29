<?php
//Formulário para clube


require_once(__DIR__ . "/../../controller/EstadioController.php");
require_once(__DIR__ . "/../include/header.php");

$estadioCont = new EstadioController();
$estadios = $estadioCont->listar();

?>

<h2 class="text-center mt-4"><?php echo (!$clube || $clube->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Clube</h2>

<style>
    body::-webkit-scrollbar {
        display: none;
    }
</style>

<form id="formClube" method="POST" class="row g-3 mt-2" enctype="multipart/form-data">

    <!--Nome do clube-->
    <div class="col-md-4">
        <label for="txtNomeClube" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$nomeClube) {
                    echo "<p class='mb-0 fw-bold text-danger'>Nome do clube:</p>";
                } elseif (strlen($nomeClube) <= 3) {
                    echo "<p class='mb-0 fw-bold text-danger'>Isso é realmente um nome?</p>";
                } elseif ($nomeClube) {
                    echo "<p class='mb-0 fw-bold text-success'>$nomeClube</p>";
                }
            } else echo "Nome do clube:";
            ?></label>
        <br>
        <input placeholder="Nome do clube" type="text" name="nome_clube" class="form-control fs-5" id="txtNomeClube" value="<?php echo ($clube ? $clube->getNomeClube() : ''); ?>" />
    </div>

    <!--Iniciais do clube-->
    <div class="col-md-3">
        <label for="iniciais" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$iniciais) {
                    echo "<p class='mb-0 fw-bold text-danger'>Iniciais:</p>";
                } elseif (strlen($iniciais) > 3) {
                    echo "<p class='mb-0 fw-bold text-danger'>Iniciais devem conter 3 letras.</p>";
                } elseif (strlen($iniciais) < 3) {
                    echo "<p class='mb-0 fw-bold text-danger'>Iniciais devem conter 3 letras.</p>";
                } elseif ($iniciais) {
                    echo "<p class='mb-0 fw-bold text-success'>$iniciais</p>";
                }
            } else echo "Iniciais:";
            ?></label>
        <br>
        <input placeholder="Iniciais do clube. Ex: FLA" type="text" name="iniciais" class="form-control fs-5" id="iniciais" value="<?php echo ($clube ? $clube->getIniciais() : ''); ?>" />
    </div>

    <!--Escudo-->
    <div class="col-md-5">
        <label for="escudo" class="form-label fs-5">Escudo:</label>
        <br>
        <input type="file" name="escudo" class="form-control fs-5" id="escudo" accept="image/" value="<?php echo isset($_POST['escudo']) ? $_POST['escudo'] : ($clube ? $clube->getEscudo() : ''); ?>">
    </div>

    <!--Sede-->
    <div class="col-md-4">
        <label for="sede" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$sede) {
                    echo "<p class='mb-0 fw-bold text-danger'>Sede:</p>";
                } elseif ($sede) {
                    echo "<p class='mb-0 fw-bold text-success'>" . $sede . "</p>";
                }
            } else echo "Sede:";
            ?></label>
        <br>
        <input placeholder="Sede do clube. Ex: Rio de Janeiro - RJ" type="text" name="sede" class="form-control fs-5" id="altura" value="<?php echo ($clube ? $clube->getSede() : ''); ?>" />
    </div>

    <!--Técnico-->
    <div class="col-md-4">
        <label for="tecnico" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$tecnico) {
                    echo "<p class='mb-0 fw-bold text-danger'>Tecnico:</p>";
                } elseif ($tecnico) {
                    echo "<p class='mb-0 fw-bold text-success'>" . $tecnico . "</p>";
                }
            } else echo "Técnico:";
            ?></label>
        <br>
        <input placeholder="Nome do técnico do clube" type="text" name="tecnico" class="form-control fs-5" id="tecnico" value="<?php echo ($clube ? $clube->getTecnico() : ''); ?>" />
    </div>

    <!--Presidente-->
    <div class="col-md-4">
        <label for="presidente" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$presidente) {
                    echo "<p class='mb-0 fw-bold text-danger'>Presidente:</p>";
                } elseif ($presidente) {
                    echo "<p class='mb-0 fw-bold text-success'>" . $presidente . "</p>";
                }
            } else echo "Presidente:";
            ?></label>
        <br>
        <input placeholder="Nome do presidente do clube" type="text" name="presidente" class="form-control fs-5" id="presidente" value="<?php echo ($clube ? $clube->getPresidente() : ''); ?>" />
    </div>

    <!--Cor 1-->
    <div class="col-md-2">
        <label for="color1" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$cor1) {
                    echo "<p class='mb-0 fw-bold text-danger'>Cor 1:</p>";
                } elseif ($cor1) {
                    echo "<p class='mb-0 fw-bold text-success'>$cor1</p>";
                }
            } else echo "Cor 1";
            ?></label>
        <br>
        <input type="color" name="cor1" class="form-control fs-5" id="color1" value="<?php echo ($clube ? $clube->getCor1() : ''); ?>">
    </div>

    <!--Cor 2-->
    <div class="col-md-2">
        <label for="color2" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$cor2) {
                    echo "<p class='mb-0 fw-bold text-danger'>Cor 2:</p>";
                } elseif ($cor2) {
                    echo "<p class='mb-0 fw-bold text-success'>$cor2</p>";
                }
            } else echo "Cor 2";
            ?></label>
        <br>
        <input type="color" name="cor2" class="form-control fs-5" id="color2" value="<?php echo ($clube ? $clube->getCor2() : ''); ?>">
    </div>

    <!--Estádio do clube-->
    <div class="col-md-4 mb-4">
        <label for="estadio" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$idEstadio) {
                    echo "<p class='mb-0 fw-bold text-danger'>Estádio do clube:</p>";
                } elseif ($idEstadio) {
                    echo "<p class='mb-0 fw-bold text-success'>Estádio do clube:</p>";
                }
            } else echo "Estádio do clube";
            ?></label>
        <br>

        <select id="estadio" name="id_estadio" class="form-select">
            <option value=""></option>

            <?php foreach ($estadios as $estadio) : ?>
                <option value="<?= $estadio->getId(); ?>" <?php
                                                            if ($clube && $clube->getEstadio() && $clube->getEstadio()->getId() == $estadio->getId())
                                                                echo 'selected'; ?>>
                    <?= $estadio->getNomeEstadio();
                    ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!--Divisão do clube-->
    <div class="col-md-4 mb-4">
        <label for="divisao" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$divisao) {
                    echo "<p class='mb-0 fw-bold text-danger'>Divisão do clube:</p>";
                } elseif ($Estadio) {
                    echo "<p class='mb-0 fw-bold text-success'>Divisão do clube:</p>";
                }
            } else echo "Divisão do clube";
            ?></label>
        <br>

        <select id="divisao" name="divisao" class="form-select">
            <option value=""></option>

            <option value="Série A" <?php echo ($clube && $clube->getDivisao() == 'Série A' ? 'selected' : ''); ?>>
                Série A</option>

            <option value="Série B" <?php echo ($clube && $clube->getDivisao() == 'Série B' ? 'selected' : ''); ?>>
                Série B</option>

            <option value="Série C" <?php echo ($clube && $clube->getDivisao() == 'Série C' ? 'selected' : ''); ?>>
                Série C</option>

            <option value="Série D" <?php echo ($clube && $clube->getDivisao() == 'Série D' ? 'selected' : ''); ?>>
                Série D</option>
        </select>
    </div>

    <input type="hidden" name="id" value="<?php echo ($jogador ? $jogador->getId() : 0); ?>" />
    <input type="hidden" name="submetido" value="1">

    <div class="row mt-3">
        <button type="submit" class="btn btn-success mx-auto col-md-4 fs-5">Cadastrar</button>
        <button type="reset" class="btn btn-info mx-auto col-md-4 fs-5">Limpar</button>
        <a href="listar.php" class="btn btn-outline-secondary mx-auto col-md-3 fs-5">Voltar</a>
    </div>
    </div>
</form>

<br>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>