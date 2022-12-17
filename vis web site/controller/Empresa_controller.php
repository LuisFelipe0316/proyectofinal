<?php 

	class Empresa {

		public static function Listar_Empresa(){

			$filas = EmpresaModel::Listar_Empresa();
			return $filas;
		
		}

		public static function Insertar_Empresa($Empresa,$RNC){

			$cmd = EmpresaModel::Insertar_Empresa($Empresa,$RNC);
			
		}

		public static function Editar_Empresa($idEmpresa,$Empresa,$RNC,$estado){

			$cmd = EmpresaModel::Editar_Empresa($idEmpresa,$Empresa,$RNC,$estado);
			
		}

	}


 ?>