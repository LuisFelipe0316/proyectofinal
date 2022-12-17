<?php

	require_once('Conexion.php');

	class conduceModel extends Conexion
	{
		public static function Autocomplete_Producto($search){

		 try {

		 $sugg_json = array();    // this is for displaying json data as a autosearch suggestion
		 $json_row = array();     // this is for stroring mysql results in json string

		 $keyword = preg_replace('/\s+/', ' ', $search); // it will replace multiple spaces from the input.

		 $query = "CALL sp_search_producto_conduce(:search)";
		 $stmt = Conexion::Conectar()->prepare($query);
		 $stmt->bindParam(":search", $keyword);
		 $stmt->execute();

		 if ($stmt->rowCount() > 0){

		 while($recResult = $stmt->fetch(PDO::FETCH_ASSOC)) {

			 $json_row["value"] = $recResult['idproducto'];
			 $json_row["label"] = $recResult['codigo_barra'].' - '.
			 $recResult['nombre_producto'];
			 $json_row["producto"] = $recResult['nombre_producto'];
			 $json_row["precio_venta"] = $recResult['precio_venta'];
			 $json_row["precio_venta_mayoreo"] = $recResult['precio_venta_mayoreo'];
			 $json_row["stock"] = $recResult['stock'];
			 $json_row["exento"] = $recResult['exento'];
			 $json_row["datos"] = $recResult['nombre_marca'].' - '.$recResult['siglas'];

			 array_push($sugg_json, $json_row);
		 }

		 } else {

			 $json_row["value"] = "";
			 $json_row["label"] = "";
			 $json_row["datos"] = "";
			 array_push($sugg_json, $json_row);
		 }


			$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES);
			print $jsonOutput;


		 } catch (Exception $e) {

			 echo "Error al cargar el listado";
		 }

		 }

		public static function Ver_Moneda_Reporte(){

			$dbconec = Conexion::Conectar();

			try {
				$query = "CALL sp_view_money()";
				$stmt = $dbconec->prepare($query);
				$stmt->execute();
				$count = $stmt->rowCount();

				if($count > 0)
				{
					return $stmt->fetchAll();
				}


				$dbconec = null;

			} catch (Exception $e) {

				echo "Error al cargar el listado";
			}

		}

    public static function Listar_verconduce($date,$date2)
    {
      $dbconec = Conexion::Conectar();

      try
      {
        $query = "CALL sp_view_conduce(:date,:date2);";
        $stmt = $dbconec->prepare($query);
        $stmt->bindParam(":date",$date);
        $stmt->bindParam(":date2",$date2);
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


		public static function Listar_Detalle($idconduce)
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "CALL sp_view_conduce_detalle(:idconduce);";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idconduce",$idconduce);
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

		public static function Listar_Info($idconduce)
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "CALL sp_view_info_conduce(:idconduce);";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idconduce",$idconduce);
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

		public static function Insertar_conduce($a_nombre, $tipo_pago, $entrega,
		$sumas, $iva, $exento, $retenido, $descuento, $total, $sonletras, $idusuario, $idcliente)
		{
			$dbconec = Conexion::Conectar();
			try
			{
				$query = "CALL sp_insert_conduce(:a_nombre, :tipo_pago, :entrega,
        :sumas, :iva, :exento, :retenido, :descuento, :total, :sonletras, :idusuario, :idcliente)";
				$stmt = $dbconec->prepare($query);
        $stmt->bindParam(":a_nombre",$a_nombre);
				$stmt->bindParam(":tipo_pago",$tipo_pago);
				$stmt->bindParam(":entrega",$entrega);
				$stmt->bindParam(":sumas",$sumas);
				$stmt->bindParam(":iva",$iva);
				$stmt->bindParam(":exento",$exento);
				$stmt->bindParam(":retenido",$retenido);
				$stmt->bindParam(":descuento",$descuento);
				$stmt->bindParam(":total",$total);
				$stmt->bindParam(":sonletras",$sonletras);
        $stmt->bindParam(":idusuario",$idusuario);
				$stmt->bindParam(":idcliente",$idcliente);

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

		public static function Borrar_conduce($idconduce)
		{
			$dbconec = Conexion::Conectar();
			$response = array();
			try
			{
				$query = "CALL sp_delete_conduce(:idconduce)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idconduce",$idconduce);

				if($stmt->execute())
				{
					$response['status']  = 'success';
					$response['message'] = 'conduce Eliminada Correctamente!';
				} else {

					$response['status']  = 'error';
					$response['message'] = 'No pudimos eliminar el conduce!';
				}
				echo json_encode($response);
				$dbconec = null;
			} catch (Exception $e) {
				$response['status']  = 'error';
				$response['message'] = 'Error de Ejecucion';
				echo json_encode($response);

			}

		}

		public static function Insertar_Detalleconduce($idproducto, $cantidad, $disponible, $precio_unitario, $exento, $descuento, $importe){

			try {

				$query = "CALL sp_insert_detalleconduce(:idproducto, :cantidad, :disponible, :precio_unitario, :exento, :descuento, :importe)";

				$stmt = Conexion::Conectar()->prepare($query);
		   		$stmt->bindParam(":idproducto",$idproducto);
		   		$stmt->bindParam(":cantidad",$cantidad);
					$stmt->bindParam(":disponible",$disponible);
		   		$stmt->bindParam(":precio_unitario",$precio_unitario);
		   		$stmt->bindParam(":exento",$exento);
		   		$stmt->bindParam(":descuento",$descuento);
		   		$stmt->bindParam(":importe",$importe);

				$stmt->execute();

				$dbconec = null;

			} catch (Exception $e) {
					echo $e;
				 //$data = "Error";
 	   		 //echo json_encode($data);
			}

		}


		public static function Count_verconduce($date,$date2)
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "CALL sp_count_verconduce(:date,:date2);";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":date",$date);
				$stmt->bindParam(":date2",$date2);
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


	}


 ?>
