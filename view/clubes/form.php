<?php 
//Formulário para clube

require_once(__DIR__ . "/../../controller/JogadorController.php");
require_once(__DIR__ . "/../include/header.php");

$jogadorCont = new JogadorController();
$jogador = $jogadorCont->listar();
//print_r($cursos);
?>

<h2><?php echo (!$clube || $clube->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Clube</h2>

<div class="row mb-3">
    <div class="col-6">
        <form id="frmAluno" method="POST" >

    
            <div class="form-group">
                <label for="txtNome">Nome:</label>
                <input type="text" name="nome" id="txtNome" class="form-control"
                    value="<?php echo ($clube? $clube->getNome() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtIniciais">Iniciais:</label>
                <input type="text" name="iniciais" id="txtIniciais" class="form-control"
                    value="<?php echo ($clube ? $clube->getIniciais() : ''); ?>" />
            </div>
            
            <div class="form-group">
                <label for="txtEscudo">Escudo:</label>
                <input type="file" name="escudo" id="txtEscudo" class="form-control"
                    value="<?php echo ($clube ? $clube->getEscudo() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtSede">Sede:</label>
                <input type="text" name="sede" id="txtSede" class="form-control"
                    value="<?php echo ($clube? $clube->getSede() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtTecnico">Tecnico:</label>
                <input type="text" name="tecnico" id="txtTecnico" class="form-control"
                    value="<?php echo ($clube? $clube->getTecnico() : ''); ?>" />
            </div>

            <p>Escolha a cor 1:</p>

            <div>
                <input type="color" id="head" name="head" value="" />
                <label for="head">Head</label>
            </div>

            <p>Escolha a cor 2:</p>

            <div>
                <input type="color" id="head" name="head" value="" />
                <label for="head">Head</label>
            </div>

                 <p>Escolha a cor 3:</p>

            <div>
                <input type="color" id="head" name="head" value="#e66465" />
                <label for="head">Head</label>
            </div>

            

                <div>
        <label for="clube">Estadio do jogador:</label>
        <select id="clube" name="id_estadio">
            <option value="">---Selecione---</option>

            <?php foreach($clubes as $clube): ?>
                <option value="<?= $clube->getId(); ?>"
                    <?php 
                        if($clube && $clube->getClube() && 
                            $clube->getClube()->getId() == $clube->getId())
                            echo 'selected';
                    ?>
                >
                    <?= $clube->getNomeClube(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>



            <input type="hidden" name="id" 
                value="<?php echo ($clube ? $clube->getId() : 0); ?>" />
            
            <input type="hidden" name="submetido" value="1" />

            <button type="submit" class="btn btn-success">Gravar</button>
            <button type="reset" class="btn btn-info">Limpar</button>
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
    </div>    
</div>

<a href="listar.php" class="btn btn-outline-secondary">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
