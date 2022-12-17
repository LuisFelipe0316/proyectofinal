<?php

	class conduce {

		public static function Autocomplete_Producto($search){

			$filas = conduceModel::Autocomplete_Producto($search);
			return $filas;

		}

		public static function Ver_Moneda_Reporte(){

			$filas = conduceModel::Ver_Moneda_Reporte();
			return $filas;

		}

		public static function Listar_verconduce($date,$date2){

			$filas = conduceModel::Listar_verconduce($date,$date2);
			return $filas;

		}

		public static function Listar_Detalle($idconduce){

			$filas = conduceModel::Listar_Detalle($idconduce);
			return $filas;

		}

		public static function Listar_Info($idconduce){

			$filas = conduceModel::Listar_Info($idconduce);
			return $filas;

		}

		public static function Count_verconduce($date,$date2){

			$filas = conduceModel::Count_verconduce($date,$date2);
			return $filas;

		}

		public static function Insertar_conduce($a_nombre, $tipo_pago, $entrega,
		$sumas, $iva, $exento, $retenido, $descuento, $total, $sonletras, $idusuario, $idcliente){

		$cmd = conduceModel::Insertar_conduce($a_nombre, $tipo_pago, $entrega,
		$sumas, $iva, $exento, $retenido, $descuento, $total, $sonletras, $idusuario, $idcliente);

		}

		public static function Insertar_Detalleconduce($idproducto, $cantidad, $disponible, $precio_unitario, $exento, $descuento, $importe){

		$cmd = conduceModel::Insertar_Detalleconduce($idproducto, $cantidad, $disponible, $precio_unitario, $exento, $descuento, $importe);

		}


		public static function Borrar_conduce($idconduce){

		$cmd = conduceModel::Borrar_conduce($idconduce);

		}

	}


 ?>
