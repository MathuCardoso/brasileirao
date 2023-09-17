<?php
//Formulário para alunos

require_once(__DIR__ . "/../../controller/ClubeController.php");
require_once(__DIR__ . "../../../model/FavPosicao.php");
require_once(__DIR__ . "../../../model/Clube.php");
require_once(__DIR__ . "/../include/header.php");

$cursoCont = new ClubeController();
$cursos = $ClubeCont->listar();
//print_r($cursos);
?>

<h2><?php echo (!$jogador || $jogador->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Jogador</h2>

<form id="frmAluno" method="POST">

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" name="nome" id="txtNome" value="<?php echo ($jogador ? $jogador->getNome() : ''); ?>" />
    </div>

    <div>
        <label for="txtNascimento">Data de nascimento:</label>
        <input type="date" name="nascimento" id="txtNascimento" value="<?php echo ($jogador ? $jogador->getNascimento() : ''); ?>" />
    </div>

    <div>
        <label for="selNumero">Número:</label>
        <select id="selNumero" name="numero">
            <option value="">---Selecione---</option>
            <?php
            for ($i = 0; $i <= 99; $i++) {
                echo "<option value='$i' ($numero == $i ? ' selected' : '')>$i</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="nomeCamisa">Nome na camisa:</label>
        <input type="text" name="nomeCamisa" id="nomeCamisa" value="<?php echo ($jogador ? $jogador->getNomeCamisa() : ''); ?>" />
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

            <option value="D" <?php echo ($jogador && $jogador->getPe() == 'D' ? 'selected' : ''); ?>>
                Direito</option>

            <option value="E" <?php echo ($jogador && $jogador->getPe() == 'E' ? 'selected' : ''); ?>>
                Esquerdo</option>

            <option value="A" <?php echo ($jogador && $jogador->getPe() == 'A' ? 'selected' : ''); ?>>
                Ambidestro</option>
        </select>
    </div>

    <div>
        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" id="nacionalidade" value="<?php
                                                                            echo ($jogador ? $jogador->getNacionalidade() : ''); ?>" />
    </div>

    
    <div>
        <label for="ataque">Ataque</label>
            <input type="radio" name="posicao" class="radio" id="ataque" value="Ataque" <?php echo ($posicao == 'Ataque' ? 'checked' : ''); ?>>
    </div>

    <div class="input-radio">
        <label for="meio-campo">Meio-Campo</label>
        <input type="radio" name="posicao" class="radio" id="meio-campo" value="Meio-Campo" <?php echo ($posicao == 'Meio-Campo' ? 'checked' : ''); ?>>
    </div>


    <div class="input-radio">
        <label for="defesa">Defesa</label>
        <input type="radio" name="posicao" class="radio" id="defesa" value="Defesa" <?php echo ($posicao == 'Defesa' ? 'checked' : ''); ?>>
    </div>

    <div class="input-radio">
        <label for="gol">Goleiro</label>
        <input type="radio" name="posicao" class="radio" id="gol" value="Gol" <?php echo ($posicao == 'Gol' ? 'checked' : ''); ?>>
    </div>

    


    <input type="hidden" name="id" value="<?php echo ($aluno ? $aluno->getId() : 0); ?>" />

    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>
</form>

<div style="color: red;">
    <?php echo $msgErro; ?>
</div>

<a href="listar.php">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>