<fieldset id="aprendiz">
    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Datos de aprendiz</legend>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Centro *</label>				  	
                    <select class="form-control" name="centro-reg" id="centro-reg">
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Especialidad *</label>				  	
                    <select class="form-control especialidad-reg" name="especialidad-reg" id="especialidad-reg">
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Ficha *</label>
                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="ficha-reg" maxlength="20">
                </div>
            </div>
        </div>
    </div>
</fieldset>