<?php 

	require_once('Conexion.php');

	class EmpresaModel extends Conexion
	{
		public static function Listar_Empresa()
		{
			$dbconec = Conexion::Conectar();

			try 
			{
				$query = "CALL sp_view_Empresa();";
				$stmt = $dbconec->prepare($query);
				$stmt->execute();
				$count = $stmt->rowCount();

				if($count > 0)
				{
					return $stmt->fetchAll();
				}

				
				$dbconec = null;
			} catch (Exception $e) {
				
				echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
			}
		}

		public static function Insertar_Empresa($Empresa,$RNC)
		{
			$dbconec = Conexion::Conectar();
			try 
			{
				$query = "CALL sp_insert_Empresa(:Empresa,:RNC)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":Empresa",$Empresa);
				$stmt->bindParam(":RNC",$RNC);

				if($stmt->execute())
				{
					$count = $stmt->rowCount();
					if($count == 0){
						$data = "Duplicado";
 	   					echo json_encode($data);
					} else {
						$data = "Validado";
 	   					echo json_encode($data);
					}
				} else {

					$data = "Error";
 	   		 	 	echo json_encode($data);
				}
				$dbconec = null;
			} catch (Exception $e) {
				$data = "Error";
				echo json_encode($data);
				
			}

		}

		public static function Editar_Empresa($idEmpresa,$Empresa,$RNC,$estado)
		{
			$dbconec = Conexion::Conectar();
			try 
			{
				$query = "CALL sp_update_Empresa(:idEmpresa,:Empresa,:RNC,:estado);";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idEmpresa",$idEmpresa);
				$stmt->bindParam(":Empresa",$Empresa);
				$stmt->bindParam(":RNC",$RNC);
				$stmt->bindParam(":estado",$estado);


				if($stmt->execute())
				{

				  $data = "Validado";
   				  echo json_encode($data);
				
				} else {

					$data = "Error";
 	   		 	 	echo json_encode($data);
				}
				$dbconec = null;
			} catch (Exception $e) {
				$data = "Error";
				echo json_encode($data);
			
			}

		}

	}


 ?>