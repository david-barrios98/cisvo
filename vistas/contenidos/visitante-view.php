<!--Contenido-Formulario-Para visitantes-->
<fieldset id="visitante">
    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Datos de visitante</legend>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="form-group label-floating">
                    <label class="control-label">Destino *</label>
                    <input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,100}"class="form-control" type="text" name="destino-txt" required="" maxlength="100">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="form-group label-floating">
                    <label class="control-label">Motivo *</label>
                    <textarea class="form-control" name="motivo-txt" id="motivo-txt" required="" cols="30" rows="2" maxlength="1000"></textarea>								
                </div>
            </div>
        </div>
    </div>
</fieldset>