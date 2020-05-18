<?php

    if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}

    /**
    *@author Jesus Orozco
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(propietarioModelo) para la interaccion directa con la base de datos.
    * 
    */

    class propietarioModelo extends mainModelo{
        
        /**
        *@param $datos, array que trae la respectiva informacion a ser registrada.
        *@return 
        *Funcion para añadir propietarios en la base de datos con un array. 
        */
        protected function registrar_propietario_modelo($datos){
            $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_propietario_poseedor/*(Pro_Doc,Pro_Nombre,Pro_Apellido,Pro_FechaNac,Pro_Direccion,Pro_Municipio,Pro_Correo,Pro_Celular,Pro_Genero,Pro_Foto,Pro_Estado,Pro_Usu_Doc)*/ 
            VALUES(:Id,:Nombre,:Apellido,:Fnaci,:Dire,:Muni_Ciudad,:Correo,:Telefono,:Genero,:Foto,:Estado,:Usuario)");

            /*Funcion para vincular un parametro al nombre de la variable espcificada */
            $sql->bindParam(":Id",$datos['Id']);
            $sql->bindParam(":Nombre",$datos['Nombre']);
            $sql->bindParam(":Apellido",$datos['Apellido']);
            $sql->bindParam(":Fnaci",$datos['Fnaci']);
            $sql->bindParam(":Dire",$datos['Dire']);
            $sql->bindParam(":Muni_Ciudad",$datos['Muni_Ciudad']);
            $sql->bindParam(":Correo",$datos['Correo']);
            $sql->bindParam(":Telefono",$datos['Telefono']);
            $sql->bindParam(":Genero",$datos['Genero']);
            $sql->bindParam(":Foto",$datos['Foto']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->execute();
            return $sql;
        }        
        
        /**
        *@param $datos, array que trae la respectiva informacion a ser registrada.
        *@return 
        *Funcion para añadir funcionarios en la base de datos con un array. 
        */
        protected function registrar_funcionario_modelo($datos){
            $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_funcionario(Fun_Tipo_Vin,Fun_Cargo,Fun_Area,Fun_Pro_Doc)VALUES(:Vin, :Cargo, :Area, :Id)");//se realiza la sentencia sql para la insercion

           /*Funcion para vincular un parametro al nombre de la variable espcificada */
            $sql->bindParam(":Vin",$datos['Vin']);
            $sql->bindParam(":Cargo",$datos['Cargo']);
            $sql->bindParam(":Area",$datos['Area']);
            $sql->bindParam(":Id",$datos['Id']);
            $sql->execute();
            return $sql;
        }

        /**
        *@param $datos, array que trae la respectiva informacion a ser registrada.
        *@return 
        *Funcion para añadir visitante en la base de datos con un array 
        */
        protected function registrar_visitante_modelo($datos){
            $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_visitante(Vis_Destino,Vis_Motivo,Vis_Pro_Doc) 
            VALUES(:Destino, :Motivo, :Id)");//se realiza la sentencia sql para la insercion 

            /*Funcion para vincular un parametro al nombre de la variable espcificada */
            $sql->bindParam(":Destino",$datos['Destino']);
            $sql->bindParam(":Motivo",$datos['Motivo']);
            $sql->bindParam(":Id",$datos['Id']);

            $sql->execute();
            return $sql;
        }


        /**
        *@param $datos, array que trae la respectiva informacion a ser registrada.
        *@return 
        *Funcion para añadir aprendiz en la base de datos con un array
        */
        protected function registrar_aprendiz_modelo($datos){/* */
            $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_aprendiz(Apr_Centro,Apr_Especialidad,Apr_Ficha,Apr_Pro_Doc)
            VALUES(:Centro,:Especialidad,:Ficha,:Id)");//se realiza la sentencia sql para la insercion
            
            /*Funcion para vincular un parametro al nombre de la variable espcificada */
            $sql->bindParam(":Centro",$datos['Centro']);
            $sql->bindParam(":Especialidad",$datos['Especialidad']);
            $sql->bindParam(":Ficha",$datos['Ficha']);
            $sql->bindParam(":Id",$datos['Id']);
            $sql->execute();
            return $sql;    
        }       

        /**
        *@param 
        *@return 
        *Funcion para elimnar un propietario de la base de datos
        */
        protected function eliminar_propietario_modelo($id){
			$query=mainModelo::conectar_bd()->prepare("DELETE FROM tbl_propietario_poseedor WHERE Pro_Doc=:doc");
			$query->bindParam(":doc", $id);
			$query->execute();
			return $query;
		}

        protected function ejecutar_consulta_propietario($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_propietario_poseedor WHERE Pro_Doc=:Id");
			$respuesta->bindParam(":Id",$parametro);
			$respuesta->execute();
			return $respuesta;
        }
        
        protected function ejecutar_consulta_email($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT Pro_Correo FROM tbl_propietario_poseedor WHERE Pro_Correo=:Correo");
			$respuesta->bindParam(":Correo",$parametro);
			$respuesta->execute();
			return $respuesta;
		}
    }