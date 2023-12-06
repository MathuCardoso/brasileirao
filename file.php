<div class="card-body d-flex py-0 pl-0 pr-0 p-0">
    <div class="card-body p-0">
        <p class="card-text fw-bold mb-0 py-1 fs-5">Idade: <?php echo "<span class='fw-normal parametro'>" . $j->getIdade() . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">Peso: <?php echo "<span class='fw-normal parametro'>" . $j->getPeso() . "kg" . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">Altura: <?php echo "<span class='fw-normal parametro'>" . $j->getAltura() . "cm" . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">Pé: <?php echo "<span class='fw-normal parametro'>" . $j->getPe() . "</span>"; ?></p>
    </div>
    <div class="card-body ml-3 p-0">
        <p class="card-text fw-bold mb-0 py-1 fs-5">Número: <?php echo "<span class='fw-normal parametro'>" . $j->getNumero() . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">País: <?php echo "<span class='fw-normal parametro'>" . $j->getPais() . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">Posicao: <?php echo "<span class='fw-normal parametro'>" . $j->getPosicao() . "</span>"; ?></p>
        <p class="card-text fw-bold mb-0 py-1 fs-5">Clube: <?php $clube = $j->getClube();
                                                    if ($clube) {
                                                        echo "<span class='fw-normal parametro'>" . $clube->getNomeClube() . "</span>";
                                                    } ?></p>
    </div>
</div>