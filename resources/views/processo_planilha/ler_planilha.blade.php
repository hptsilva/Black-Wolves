<?php
class LerPlanilha{

    public function lerArquivo($arquivo, $arquivo_imagem, $code){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
        $spreadsheet = $reader->load($arquivo);
        $worksheet = $spreadsheet->getActiveSheet();
        
        ?>  <!-- Processa os dados da planilha e os converte para o formato html-->
            <div class="row build">
                <div class="col-4">
                    <div class="build-op">
                        <h1 style="color: White; margin-bottom: 15px; float:left;" >&vrtri; <?php echo($worksheet->getCell('B66')->getValue()) ?></h1>
                        <a id="imagem-build" target="_blank" href="<?php echo($arquivo_imagem) ?>"><img class="img-thumbnail" src="<?php echo($arquivo_imagem); ?>"></a>
                        <div id="list-build-op-<?php echo $code;?>" class="d-flex flex-column gap-2 simple-list-example-scrollspy">
                            <a class="p-1 rounded" href="#_<?php echo $code.'_arma_primaria';?>">Arma Primária</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_arma_secundaria';?>">Arma Secundária</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_arma_reserva';?>">Arma Reserva</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_mascara';?>">Máscara</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_mochila';?>">Mochila</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_colete';?>">Colete</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_luva';?>">Luva</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_coldre';?>">Coldre</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_joelheira';?>">Joelheira</a>
                            <a class="p-1 rounded" href="#_<?php echo $code.'_habilidades';?>">Habilidades</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="scrollspy-example descricao"  data-bs-spy="scroll" data-bs-target="#list-build-op-<?php echo $code;?>" data-bs-offset="0" data-bs-smooth-scroll="true" tabindex="0">
                        <ul>
                            <li id="_<?php echo $code.'_arma_primaria';?>"><strong>&rarrhk; Arma Primária: </strong><?php echo($worksheet->getCell('B1')->getValue())?> (<?php echo($worksheet->getCell('B5')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B2')->getValue())?>: <?php echo($worksheet->getCell('C2')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D2')->getValue())?>: <?php echo($worksheet->getCell('E2')->getValue())?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B3')->getValue())?>: <?php echo($worksheet->getCell('C3')->getValue())?>;</span>
                                </div>
                                <li><strong>&bull; Talento: </strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B4')->getValue()) ?>;</span>
                                </div>
                            </ul>
                            <li id="_<?php echo $code.'_arma_secundaria';?>"><strong>&rarrhk; Arma Secundária: </strong><?php echo($worksheet->getCell('B7')->getValue())?> (<?php echo($worksheet->getCell('B11')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B8')->getValue())?>: <?php echo($worksheet->getCell('C8')->getValue())?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D8')->getValue())?>: <?php echo($worksheet->getCell('E8')->getValue())?>;</span><br>
                                </div>
                                <li><strong> &bull;Atributos:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B9')->getValue())?>: <?php echo($worksheet->getCell('C9')->getValue())?>;</span>
                                </div>
                                <li><strong>&bull; Talento: </strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B10')->getValue()) ?>;</span>
                                </div>
                            </ul>
                            <li id="_<?php echo $code.'_arma_reserva';?>"><strong>&rarrhk; Arma Reserva: </strong><?php echo($worksheet->getCell('B60')->getValue())?> (<?php echo($worksheet->getCell('B64')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B61')->getValue())?>: <?php echo($worksheet->getCell('C61')->getValue())?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B62')->getValue())?>: <?php echo($worksheet->getCell('C62')->getValue())?>;</span>
                                </div>
                                <li><strong>&bull; Talento:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B63')->getValue()) ?>;</span>
                                </div>
                            </ul>
                            <li><strong>&rarrhk;Especialização: </strong><?php echo($worksheet->getCell('B13')->getValue()) ?>;</li>
                            <br>

                            <!-- Máscara -->

                            <li id="_<?php echo $code.'_mascara';?>"><strong>&rarrhk; Máscara: </strong><?php echo($worksheet->getCell('B15')->getValue()) ?> (<?php echo($worksheet->getCell('B20')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B16')->getValue()) ?>: <?php echo($worksheet->getCell('C16')->getValue()) ?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                    <?php
                                    if($worksheet->getCell('B20')->getValue() == 'Gear Set'){
                                    ?> <span><?php echo($worksheet->getCell('B17')->getValue()) ?>:
                                    <?php
                                        if($worksheet->getCell('B17')->getValue() == 'Vida' || $worksheet->getCell('B17')->getValue() == 'regeneracao'){
                                                echo($worksheet->getCell('C17')->getValue()) ?>;</span><br><?php
                                        } else {
                                            echo($worksheet->getCell('C17')->getValue()) ?>;</span><br><?php
                                        }
                                    }
                                    else{
                                    ?> <span><?php echo($worksheet->getCell('B17')->getValue()) ?>: <?php echo($worksheet->getCell('C17')->getValue()) ?>;</span><br>
                                        <span><?php echo($worksheet->getCell('D17')->getValue()) ?>: <?php echo($worksheet->getCell('E17')->getValue()) ?>;</span><br><?php
                                    }
                                    ?>
                                </div>
                                <li><strong>&bull; Modificação:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo(($worksheet->getCell('B18')->getValue()).': '.($worksheet->getCell('C18')->getValue())) ?>;</span><br>
                                </div>
                            </ul>

                            <!-- Mochila --> 

                            <li id="_<?php echo $code.'_mochila';?>"><strong>&rarrhk; Mochila: </strong><?php echo($worksheet->getCell('B22')->getValue()) ?> (<?php echo($worksheet->getCell('B27')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B23')->getValue()) ?>: <?php echo($worksheet->getCell('C23')->getValue()) ?>;</span><br>
                                    <?php
                                    if ($worksheet->getCell('B27')->getValue() == 'Exótica (Lembrancinha)' || $worksheet->getCell('B27')->getValue() == 'Exótica (Ninjabike)'){?>
                                        <span><?php echo($worksheet->getCell('D23')->getValue()) ?>: <?php echo($worksheet->getCell('E23')->getValue()) ?>;</span><br><?php
                                    }
                                    ?>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                    <?php
                                    if($worksheet->getCell('B27')->getValue() == 'Gear Set'){
                                        ?> <span><?php echo($worksheet->getCell('B24')->getValue()) ?>: <?php echo($worksheet->getCell('C24')->getValue()) ?>;</span><br><?php
                                    }else{
                                        ?> <span><?php echo($worksheet->getCell('B24')->getValue()) ?>: <?php echo($worksheet->getCell('C24')->getValue()) ?>;</span><br>
                                        <span><?php echo($worksheet->getCell('D24')->getValue()) ?>: <?php echo($worksheet->getCell('E24')->getValue()) ?>;</span><br><?php
                                    }
                                    ?>
                                </div>
                                <li><strong>&bull; Modificação:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo(($worksheet->getCell('B25')->getValue()).': '.($worksheet->getCell('C25')->getValue())) ?>;</span><br>
                                </div>
                                <?php
                                if ($worksheet->getCell('B27')->getValue() == 'Normal'){?>
                                    <li><strong>&bull; Talento: </strong></li>
                                    <div class='text-start m-3'>
                                        <span><?php echo($worksheet->getCell('B26')->getValue()) ?>;</span><br>
                                    </div>
                                        <?php
                                }
                                ?>
                            </ul>

                            <!-- Colete -->

                            <li id="_<?php echo $code.'_colete';?>"><strong>&rarrhk; Colete: </strong><?php echo($worksheet->getCell('B29')->getValue()) ?> (<?php echo($worksheet->getCell('B34')->getValue()) ?>)</li>
                            <br>
                            <ul class="">
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B30')->getValue()) ?>: <?php echo($worksheet->getCell('C30')->getValue()) ?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</li></strong>
                                <div class='text-start m-3'>
                                    <?php
                                    if($worksheet->getCell('B34')->getValue() == 'Gear Set'){
                                        ?><span><?php echo($worksheet->getCell('B31')->getValue()) ?>: <?php echo($worksheet->getCell('C31')->getValue()) ?>;</span><br><?php
                                    }else{
                                        ?><span><?php echo($worksheet->getCell('B31')->getValue()) ?>: <?php echo($worksheet->getCell('C31')->getValue()) ?>;</span><br>
                                        <span><?php echo($worksheet->getCell('D31')->getValue()) ?>: <?php echo($worksheet->getCell('E31')->getValue()) ?>;</span><br><?php
                                    }
                                    ?>
                                </div>
                                <li><strong>&bull; Modificação:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo(($worksheet->getCell('B32')->getValue()).': '.($worksheet->getCell('C32')->getValue())) ?>;</span><br>
                                </div>
                                <?php
                                if ($worksheet->getCell('B34')->getValue() == 'Normal'){?>
                                    <li><strong>&bull; Talento: </strong></li>
                                    <div class='text-start m-3'>
                                        <span><?php echo($worksheet->getCell('B33')->getValue()) ?>;</span><br>
                                    </div><?php
                                }?>
                            </ul>

                            <!-- Luva -->

                            <li id="_<?php echo $code.'_luva';?>"><strong>&rarrhk; Luva: </strong><?php echo($worksheet->getCell('B36')->getValue()) ?> (<?php echo($worksheet->getCell('B41')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B37')->getValue()) ?>: <?php echo($worksheet->getCell('C37')->getValue()) ?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                <?php
                                if($worksheet->getCell('B41')->getValue() == 'Gear Set'){
                                    ?><span><?php echo($worksheet->getCell('B38')->getValue()) ?>: <?php echo($worksheet->getCell('C38')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if ($worksheet->getCell('B41')->getValue() == 'Exótico'){
                                    ?><span><?php echo($worksheet->getCell('B38')->getValue()) ?>: <?php echo($worksheet->getCell('C38')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D38')->getValue()) ?>: <?php echo($worksheet->getCell('E38')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if ($worksheet->getCell('B41')->getValue() == 'Improvisado'){
                                    ?><span><?php echo($worksheet->getCell('B38')->getValue()) ?>: <?php echo($worksheet->getCell('C38')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D38')->getValue()) ?>: <?php echo($worksheet->getCell('E38')->getValue()) ?>;</span><br>
                                    </div>
                                    <li><strong>&bull; Modificação:</strong></li>
                                    <div class='text-start m-3'>
                                        <span><?php echo($worksheet->getCell('B39')->getValue()) ?>: <?php echo($worksheet->getCell('C39')->getValue()) ?>;</span>
                                    </div>
                                    <?php
                                }else{
                                    ?><span><?php echo($worksheet->getCell('B38')->getValue()) ?>: <?php echo($worksheet->getCell('C38')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D38')->getValue()) ?>: <?php echo($worksheet->getCell('E38')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }?>
                            </ul>

                            <!-- Coldre --> 

                            <li id="_<?php echo $code.'_coldre';?>"><strong>&rarrhk; Coldre: </strong><?php echo($worksheet->getCell('B43')->getValue()) ?> (<?php echo($worksheet->getCell('B48')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B44')->getValue()) ?>: <?php echo($worksheet->getCell('C44')->getValue())?>;</span><br>
                                </div>
                                <li><strong>&bull; Atributos:</strong></li>
                                <div class='text-start m-3'>
                                <?php
                                if($worksheet->getCell('B48')->getValue() == 'Gear Set'){
                                    ?><span><?php echo($worksheet->getCell('B45')->getValue()) ?>: <?php echo($worksheet->getCell('C45')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if($worksheet->getCell('B48')->getValue() == 'Exótico'){
                                    ?><span><?php echo($worksheet->getCell('B45')->getValue()) ?>: <?php echo($worksheet->getCell('C45')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D45')->getValue()) ?>: <?php echo($worksheet->getCell('E45')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if($worksheet->getCell('B48')->getValue() == 'Improvisado'){
                                    ?><span><?php echo($worksheet->getCell('B45')->getValue()) ?>: <?php echo($worksheet->getCell('C45')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D45')->getValue()) ?>: <?php echo($worksheet->getCell('E45')->getValue()) ?>;</span><br>
                                    </div>
                                    <li><strong>&bull; Modificação:</strong></li>
                                    <div class='text-start m-3'>
                                        <span><?php echo($worksheet->getCell('B46')->getValue()) ?>: <?php echo($worksheet->getCell('C46')->getValue()) ?>;</span><br>
                                    </div>
                                        <?php
                                }else{
                                    ?><span><?php echo($worksheet->getCell('B45')->getValue()) ?>: <?php echo($worksheet->getCell('C45')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D45')->getValue()) ?>: <?php echo($worksheet->getCell('E45')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }
                                ?>
                            </ul>

                            <!-- Joelheira -->
                            <li id="_<?php echo $code.'_joelheira';?>"><strong>&rarrhk; Joelheira: </strong><?php echo($worksheet->getCell('B50')->getValue()) ?> (<?php echo($worksheet->getCell('B55')->getValue()) ?>)</li>
                            <br>
                            <ul>
                                <li><strong>&bull; Atributo Central:</strong></li>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B51')->getValue()) ?>: <?php echo($worksheet->getCell('C51')->getValue()) ?>;</span><br>
                                </div>
                                <li><strong>&bull;Atributos:</strong></li>
                                <div class='text-start m-3'>
                                <?php
                                if($worksheet->getCell('B55')->getValue() == 'Gear Set' ){
                                    ?><span><?php echo($worksheet->getCell('B52')->getValue()) ?>: <?php echo($worksheet->getCell('C52')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if ($worksheet->getCell('B55')->getValue() == 'Exótico'){
                                    ?><span><?php echo($worksheet->getCell('B52')->getValue()) ?>: <?php echo($worksheet->getCell('C52')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D52')->getValue()) ?>: <?php echo($worksheet->getCell('E52')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }else if ($worksheet->getCell('B55')->getValue() == 'Improvisado') {
                                    ?><span><?php echo($worksheet->getCell('B52')->getValue()) ?>: <?php echo($worksheet->getCell('C52')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D52')->getValue()) ?>: <?php echo($worksheet->getCell('E52')->getValue()) ?>;</span>
                                    </div>
                                    <br>
                                    <li><strong>&bull; Modificação:</strong></li>
                                    <div class='text-start m-3'>
                                        <span><?php echo($worksheet->getCell('B53')->getValue()) ?>;</span><br>
                                    </div>
                                        <?php
                                }else{
                                    ?><span><?php echo($worksheet->getCell('B52')->getValue()) ?>: <?php echo($worksheet->getCell('C52')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('D52')->getValue()) ?>: <?php echo($worksheet->getCell('E52')->getValue()) ?>;</span><br>
                                    </div>
                                    <?php
                                }
                                ?>
                            </ul>

                            <!-- Habilidades -->

                            <li id="_<?php echo $code.'_habilidades';?>"><strong>&rarrhk; Habilidades:</strong></li>
                            <ul>
                                <div class='text-start m-3'>
                                    <span><?php echo($worksheet->getCell('B57')->getValue()) ?>;</span><br>
                                    <span><?php echo($worksheet->getCell('B58')->getValue()) ?>;</span>
                                </div>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
    }
}
?>