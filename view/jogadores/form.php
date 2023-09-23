<?php
//Formulário para jogadores


require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../include/header.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();
?>

<h2><?php echo (!$jogador || $jogador->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Jogador</h2>

<form id="formJogador" method="POST" class="needs-validation" novalidate>

    <div class="form-group">
        <label for="txtNomeJogador" class="form-label">Nome do jogador:</label>
        <br>
        <input type="text" name="nomeJogador" id="txtNomeJogador" value="<?php echo ($jogador ? $jogador->getNomeJogador() : ''); ?>" />
    </div>

    <div class="form-group">
        <label for="txtNascimento">Idade:</label>
        <br>
        <select id="selIdade" name="idade">
            <option value=""></option>
            <?php
            for ($i = 16; $i <= 45; $i++) {
                echo "<option value='$i'" . ($jogador && $jogador->getIdade() == $i ? ' selected' : '') . ">$i</option>";
            }
            ?>
        </select>    </div>

    <div class="form-group">
        <label for="selNumero">Número:</label>
        <br>
        <select id="selNumero" name="numero">
            <option value=""></option>
            <?php
            for ($i = 1; $i <= 99; $i++) {
                echo "<option value='$i'" . ($jogador && $jogador->getNumero() == $i ? ' selected' : '') . ">$i</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="nomeUniforme">Nome no Uniforme:</label>
        <br>
        <input type="text" name="nome_uniforme" id="nomeUniforme" value="<?php echo ($jogador ? $jogador->getNomeUniforme() : ''); ?>" />
    </div>

    <div class="form-group">
        <label for="altura">Altura:</label>
        <br>
        <input type="number" name="altura" id="altura" value="<?php echo ($jogador ? $jogador->getAltura() : ''); ?>" />
    </div>

    <div class="form-group">
        <label for="peso">Peso:</label>
        <br>
        <input type="number" name="peso" id="peso" value="<?php echo ($jogador ? $jogador->getPeso() : ''); ?>" />
    </div>

    <div class="form-group">
        <label for="pe">Pé:</label>
        <br>
        <select id="pe" name="pe">
            <option value="">---Selecione---</option>

            <option value="Direito" <?php echo ($jogador && $jogador->getPe() == 'Direito' ? 'selected' : ''); ?>>
                Direito</option>

            <option value="Esquerdo" <?php echo ($jogador && $jogador->getPe() == 'Esquerdo' ? 'selected' : ''); ?>>
                Esquerdo</option>

            <option value="Ambidestro" <?php echo ($jogador && $jogador->getPe() == 'Ambidestro' ? 'selected' : ''); ?>>
                Ambidestro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pais">País:</label>
        <br>
        <input type="text" name="pais" id="pais" value="<?php echo ($jogador ? $jogador->getPais() : ''); ?>" />
    </div>


    <div class="form-group">
        <label>Posição</label>
        <br>
        <input type="radio" name="posicao" id="ataque" value="Ataque" <?php echo ($jogador && $jogador->getPosicao() == 'Ataque' ? 'checked' : ''); ?>>
        <label for="ataque">Ataque</label>

        <input type="radio" name="posicao" id="meio-campo" value="Meio-Campo" <?php echo ($jogador && $jogador->getPosicao() == 'Meio-Campo' ? 'checked' : ''); ?>>
        <label for="meio-campo">Meio-Campo</label>

        <input type="radio" name="posicao" id="defesa" value="Defesa" <?php echo ($jogador && $jogador->getPosicao() == 'Defesa' ? 'checked' : ''); ?>>
        <label for="defesa">Defesa</label>

        <input type="radio" name="posicao" id="gol" value="Goleiro" <?php echo ($jogador && $jogador->getPosicao() == 'Goleiro' ? 'checked' : ''); ?>>
        <label for="gol">Goleiro</label>

    </div>

    <div class="form-group">
        <label for="clube">Clube do jogador:</label>
        <br>
        <select id="clube" name="id_clube">
            <option value=""></option>

            <?php foreach ($clubes as $clube) : ?>
                <option value="<?= $clube->getId(); ?>" <?php 

                if ($jogador && $jogador->getClube() && 
                $jogador->getClube()->getId() == $clube->getId()) 
                
                echo 'selected';?>>
                
                <?= $clube->getNomeClube(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <input type="hidden" name="id" value="<?php echo ($jogador ? $jogador->getId() : 0); ?>" />

    <input type="hidden" name="submetido" value="1">

    <button type="submit" class="btn btn-success">Gravar</button>
    <button type="reset" class="btn btn-info">Limpar</button>
</form>

<div class="col-6 mt-4">
    <?php if ($msgErro) : ?>
        <div class="alert alert-danger">
            <?php echo $msgErro; ?>
        </div>
    <?php endif; ?>
</div>

<br>

<a href="listar.php" class="btn btn-outline-secondary">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>