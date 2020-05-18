<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';
    /**
     *@author David Barrios
     *Clase para cargar combobox de municipios
     * */
    class comboxMunicipio extends mainModelo{
        public function cagarMunicipios(){
            $conexion=mainModelo::conectar_bd();
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $municipios = "SELECT Mun_Codigo, Mun_Nombre FROM tbl_municipio WHERE Mun_Dep_Codigo = $id ORDER BY Mun_Nombre ASC";
                $datos=$conexion->query($municipios);
                $datos= $datos->fetchAll(); //array de datos con la consulta
                $combo='<option value=""></option>';

                    foreach ($datos as $fila) {
                        $combo.= "
                            <option value=".$fila['Mun_Codigo'].">".$fila['Mun_Nombre']."</option>	
                        ";
                    }
                return $combo;
            }else{
                return false;
            }
        }
        
    }

    $ins = new comboxMunicipio();
    echo $ins->cagarMunicipios();