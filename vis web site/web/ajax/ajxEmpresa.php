<?php 

	spl_autoload_register(function($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";
	
		require_once($model);
		require_once($controller);
	});

	$funcion = new Empresa();

	if(isset($_POST['Empresa'])){
		
		try {

			$proceso = $_POST['proceso'];
			$id = $_POST['id'];
			$Empresa = trim($_POST['Empresa']);
			$RNC = trim($_POST['RNC']);
			$estado = trim($_POST['estado']);

			switch($proceso){

			case 'Registro':
				$funcion->Insertar_Empresa($Empresa,$RNC);
			break;

			case 'Edicion':
				$funcion->Editar_Empresa($id,$Empresa,$RNC,$estado);
			break;

			default:
				$data = "Error";
 	   		 	echo json_encode($data);
			break;
		}
			
		} catch (Exception $e) {
			
			$data = "Error";
 	   		echo json_encode($data);
		}

	}
	
	

  	

?>
