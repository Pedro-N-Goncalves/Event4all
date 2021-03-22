<div class="modal fade modal-evento" id="modal-evento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabe" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="titulo-modal"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                   
            </div>
            <div class="modal-body">
                <img src="" class="img-rounded" id="imgmodal">
                <div class="modalcontent">
                    <div class="infoev row">
                        <p class="descricao"> </p> <br> 
                        <p class="inicio"> </p> <br>
                        <p class="termino"> </p> <br>
                        <p class="local"> </p> <br>
                        <p class="realizador"> </p> <br>
                        <p class="capacidade"> </p> <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form class="inscricao">
                    <input type="hidden" class="cod-us" value="<?php if (isset($_SESSION["cod"])) {echo $_SESSION["cod"];} ?>">
                    <input type="hidden" class="cod-ev" value="">
                    <input type="hidden" class="cod-adm" value="">
                    <p class="labelresult"> </p>

                    <button type='button' class='edit-ev btn btn-primary' style='float:left'>
                        <span class="glyphicon glyphicon-pencil" style="top: 2px"></span>&ensp;Editar evento
                    </button>

                    <button type="button" class="cancel-ev btn btn-primary" style="float:left" data-toggle="modal" data-target="#modaldelevento">
                        <span class="glyphicon glyphicon-ban-circle" style="top: 2px"></span>&ensp;Cancelar evento
                    </button>
                
                <?php 
                    if (isset($_SESSION['cod'])){ 
                        if (strlen($_SESSION["cod"]) == 8){ 
                ?>
                    <button type="submit" value="Inscrever-se" class="inscrever btn btn-primary">
                        <span class="glyphicon glyphicon-log-in" style='left:-2px'></span>&ensp;Inscrever-se
                    </button>
                <?php } } ?>

                    <button type="button" class="fechar btn btn-secondary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" style="top: 2px"></span>&ensp;Fechar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" id="modaldelevento" tabindex="-1" role="dialog" aria-labelledby="modaldelevento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#900">
                <h4 class="modal-title text-center">Cancelar evento</h4>
            </div>
            <div class="modal-body text-center">
                Deseja mesmo cancelar este evento?
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="modal-btn excluir-evento btn btn-secondary" data-dismiss="modal">Sim</button>
                <button type="button" class="modal-btn btn btn-primary" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>