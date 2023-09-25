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
    <div class="col-md-6">
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
    <div class="col-md-6">
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

    <!--Sede-->
    <div class="col-md-6">
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
    <div class="col-md-6">
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

    <!--Escudo-->
    <div class="col-md-6">
        <label for="escudo" class="form-label fs-5">Escudo:</label>
        <br>
        <input type="file" name="escudo" class="form-control fs-5" id="escudo" accept="image/" value="<?php echo isset($_POST['escudo']) ? $_POST['escudo'] : ($clube ? $clube->getEscudo() : ''); ?>">
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

    <!--Cor 3-->
    <div class="col-md-2">
        <label for="color3" class="form-label fs-5">
            <?php
            if (isset($_POST['submetido'])) {

                if (!$cor3) {
                    echo "<p class='mb-0 fw-bold text-danger'>Cor 3:</p>";
                } elseif ($cor3) {
                    echo "<p class='mb-0 fw-bold text-success'>$cor3</p>";
                }
            } else echo "Cor 3";
            ?></label>
        <br>
        <input type="color" name="cor3" class="form-control fs-5" id="color3" value="<?php echo ($clube ? $clube->getCor3() : ''); ?>">
    </div>

    <!--Estádio do clube-->
    <div class="col-md-6">
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

    <input type="hidden" name="id" value="<?php echo ($jogador ? $jogador->getId() : 0); ?>" />
    <input type="hidden" name="submetido" value="1">

        <button type="submit" class="btn btn-success mx-auto col-md-2 fs-5">Cadastrar</button>
        <button type="reset" class="btn btn-info mx-auto col-md-2 fs-5">Limpar</button>
        <a href="listar.php" class="btn btn-outline-secondary mx-auto col-md-2 fs-5">Voltar</a>
    </div>
</form>

<br>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>