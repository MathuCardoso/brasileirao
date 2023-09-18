<?php
//Formulário para jogadores


require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "/../include/header.php");

$clubeCont = new ClubeController();
$clubes = $clubeCont->listar();

//print_r($clubes);
?>

<h2><?php echo (!$jogador || $jogador->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Jogador</h2>

<form id="formJogador" method="POST">

    <div>
        <label for="txtNomeJogador">Nome do jogador:</label>
        <input type="text" name="nomeJogador" id="txtNomeJogador" value="<?php echo ($jogador ? $jogador->getNomeJogador() : ''); ?>" />
    </div>

    <div>
        <label for="txtNascimento">Idade:</label>
        <input type="number" name="idade" id="txtIdade" value="<?php echo ($jogador ? $jogador->getIdade() : ''); ?>" />
    </div>

    <div>
        <label for="selNumero">Número:</label>
        <select id="selNumero" name="numero">
            <option value="">0</option>
            <?php
            for ($i = 1; $i <= 99; $i++) {
                echo "<option value='$i'" . ($numero == $i ? ' selected' : '') . ">$i</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="nomeUniforme">Nome na Uniforme:</label>
        <input type="text" name="nome_uniforme" id="nomeUniforme" value="<?php echo ($jogador ? $jogador->getNomeUniforme() : ''); ?>" />
    </div>

    <div>
        <label for="altura">Altura:</label>
        <input type="number" name="altura" id="altura" value="<?php echo ($jogador ? $jogador->getAltura() : ''); ?>" />
    </div>

    <div>
        <label for="peso">Peso:</label>
        <input type="number" name="peso" id="peso" value="<?php echo ($jogador ? $jogador->getPeso() : ''); ?>" />
    </div>

    <div>
        <label for="pe">Pé:</label>
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

    <div>
        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" id="nacionalidade" value="<?php
                                                                            echo ($jogador ? $jogador->getNacionalidade() : ''); ?>" />
    </div>


    <div>
        <label for="posicao">Ataque</label>
        <input type="radio" name="posicao" id="ataque" value="Ataque" <?php echo ($posicao == 'Ataque' ? 'checked' : ''); ?>>

        <label for="ataque">Meio-Campo</label>
        <input type="radio" name="posicao" id="meio-campo" value="Meio-Campo" <?php echo ($posicao == 'Meio-Campo' ? 'checked' : ''); ?>>

        <label for="meio-campo">Defesa</label>
        <input type="radio" name="posicao" id="defesa" value="Defesa" <?php echo ($posicao == 'Defesa' ? 'checked' : ''); ?>>

        <label for="defesa">Goleiro</label>
        <input type="radio" name="posicao" id="gol" value="Goleiro" <?php echo ($posicao == 'Goleiro' ? 'checked' : ''); ?>>
    </div>

    <div>
        <label for="clube">Clube do jogador:</label>
        <select id="clube" name="id_clube">
            <option value="">---Selecione---</option>

            <?php foreach($clubes as $clube): ?>
                <option value="<?= $clube->getId(); ?>"
                    <?php 
                        if($jogador && $jogador->getClube() && 
                            $jogador->getClube()->getId() == $clube->getId())
                            echo 'selected';
                    ?>
                >
                    <?= $clube->getNomeClube(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <input type="hidden" name="id" value="<?php echo ($jogador ? $jogador->getId() : 0); ?>" />

    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>
</form>

<div style="color: red;">
    <?php echo $msgErro; ?>
</div>

<a href="listar.php">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>