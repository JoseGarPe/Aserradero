<?php 
$seleccion=$_POST['cod_banda'];
if ($seleccion==1) {
}else{
echo ' <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Calcular Para:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="usar"  name="usar" class="form-control col-md-7 col-xs-12"  type="number">
                            </div>
                          </div>';

}



 ?>