<?php

	class Taller {

		public static function Ver_Moneda_Reporte(){

			$filas = TallerModel::Ver_Moneda_Reporte();
			return $filas;

		}

		public static function Ver_Max_Orden(){

			$filas = TallerModel::Ver_Max_Orden();
			return $filas;

		}

		public static function Listar_Ordenes($date,$date2){

			$filas = TallerModel::Listar_Ordenes($date,$date2);
			return $filas;

		}

		public static function Reporte_Taller($id){

			$filas = TallerModel::Reporte_Taller($id);
			return $filas;

		}


		public static function Listar_Tecnicos(){

			$filas = TallerModel::Listar_Tecnicos();
			return $filas;

		}

		public static function Count_Ordenes($date,$date2){

			$filas = TallerModel::Count_Ordenes($date,$date2);
			return $filas;

		}

		public static function Insertar_Orden($idcliente,$aparato,$modelo,$idmarca,$serie,$idtecnico,$averia,
		$observaciones,$deposito_revision,$deposito_reparacion,$parcial_pagar){

		$cmd = TallerModel::Insertar_Orden($idcliente,$aparato,$modelo,$idmarca,$serie,$idtecnico,$averia,
		$observaciones,$deposito_revision,$deposito_reparacion,$parcial_pagar);

		}

		public static function Insertar_Diagnostico($idorden,$diagnostico,$estado_aparato,$repuestos,$mano_obra,$fecha_alta,$fecha_retiro,
		$ubicacion,$parcial_pagar){

		$cmd = TallerModel::Insertar_Diagnostico($idorden,$diagnostico,$estado_aparato,$repuestos,$mano_obra,$fecha_alta,$fecha_retiro,
		$ubicacion,$parcial_pagar);

		}

    public static function Editar_Orden($idorden,$numero_orden,$fecha_ingreso,$idcliente,$aparato,$modelo,$idmarca,$serie,$idtecnico,$averia,
		$observaciones,$deposito_revision,$deposito_reparacion){

		$cmd = TallerModel::Editar_Orden($idorden,$numero_orden,$fecha_ingreso,$idcliente,$aparato,$modelo,$idmarca,$serie,$idtecnico,$averia,
		$observaciones,$deposito_revision,$deposito_reparacion);

		}

		public static function Borrar_Orden($idtaller){

		$cmd = TallerModel::Borrar_Orden($idtaller);

		}

	}


 ?>
