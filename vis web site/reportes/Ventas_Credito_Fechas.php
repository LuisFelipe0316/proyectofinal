<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        if ($this->page == 1)
        {

            // Logo
            //  $this->Image('logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(98);
            // Title
            $fecha1 = isset($_GET['fecha1']) ? $_GET['fecha1'] : '';
            $fecha2 = isset($_GET['fecha2']) ? $_GET['fecha2'] : '';

            $this->Cell(105,10,'VENTAS AL CREDITO ENTRE EL '.$fecha1.' Y '.$fecha2,0,0,'C');

            // Line break
            $this->Ln(20);
        }
    }


// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(275,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'L');
        $this->Cell(43.2,10,date('d/m/Y H:i:s'),0,0,'C');
    }
}

    spl_autoload_register(function($className){
            $model = "../model/". $className ."_model.php";
            $controller = "../controller/". $className ."_controller.php";

           require_once($model);
           		require_once($controller);
	});

    $fecha1 = isset($_GET['fecha1']) ? $_GET['fecha1'] : '';
    $fecha2 = isset($_GET['fecha2']) ? $_GET['fecha2'] : '';


    $fecha1 = DateTime::createFromFormat('d/m/Y', $fecha1)->format('Y-m-d');
    $fecha2 = DateTime::createFromFormat('d/m/Y', $fecha2)->format('Y-m-d');

    $objVenta =  new Venta();
    $listado = $objVenta->Listar_Ventas('FECHAS',$fecha1,$fecha2,2);
    $parametros = $objVenta->Ver_Moneda_Reporte();

    foreach ($parametros as $row => $column) {

        $moneda = $column['CurrencyName'];

    }


    $fecha1 = DateTime::createFromFormat('Y-m-d', $fecha1)->format('d/m/Y');
    $fecha2 = DateTime::createFromFormat('Y-m-d', $fecha2)->format('d/m/Y');

try {
    // Instanciation of inherited class
    $pdf = new PDF('L','mm',array(216,330));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',11);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(35,5,'No. Venta',0,0,'L',1);
    $pdf->Cell(35,5,'Comprobante',0,0,'L',1);
    $pdf->Cell(35,5,'No. Comprobante',0,0,'L',1);
    $pdf->Cell(40,5,'Fecha y Hora Venta',0,0,'L',1);
    $pdf->Cell(110,5,'Cliente',0,0,'L',1);
    $pdf->Cell(30,5,'Tipo Pago',0,0,'L',1);
    $pdf->Cell(22,5,'Total',0,0,'C',1);
    $pdf->Line(322,28,10,28);
    $pdf->Line(322,37,10,37);
    $pdf->Ln(9);
    $total = 0;
    if (is_array($listado) || is_object($listado))
    {
        foreach ($listado as $row => $column) {

        $fecha_venta = $column["fecha_venta"];
        if(is_null($fecha_venta))
        {
            $c_fecha_venta = '';

        } else {

            $c_fecha_venta = DateTime::createFromFormat('Y-m-d H:i:s',$fecha_venta)->format('d/m/Y H:i:s');
        }

        $tipo_comprobante = $column["tipo_comprobante"];
        if($tipo_comprobante == '1')
        {
            $tipo_comprobante = 'TICKET';

        } else if ($tipo_comprobante == '2'){

            $tipo_comprobante = 'FACTURA';

        } else if ($tipo_comprobante == '3'){

            $tipo_comprobante = 'BOLETA';
        }


        $tipo_pago = $column["tipo_pago"];
        if($tipo_pago == '1')
        {
            $tipo_pago = 'CONTADO';

        } else if ($tipo_pago == '2'){

            $tipo_pago = 'CREDITO';
        }

            $pdf->setX(9);
            $pdf->Cell(35,5,$column["numero_venta"],0,0,'L',1);
            $pdf->Cell(35,5,$tipo_comprobante,0,0,'L',1);
            $pdf->Cell(35,5,$column["numero_comprobante"],0,0,'L',1);
            $pdf->Cell(40,5,$c_fecha_venta,0,0,'L',1);
            $pdf->Cell(110,5,$column["cliente"],0,0,'L',1);
            $pdf->Cell(30,5,$tipo_pago,0,0,'L',1);
            $pdf->Cell(22,5,$column["total"],0,0,'C',1);
            $total = $total + $column["total"];
            $pdf->Ln(6);
            $get_Y = $pdf->GetY();
        }

        $pdf->Line(322,$get_Y+1,10,$get_Y+1);
        $pdf->SetFont('Arial','B',11);
        $pdf->Text(10,$get_Y + 10,'MONTO TOTAL EN VENTAS AL CREDITO ENTRE FECHAS :'.number_format($total, 2, '.', ','));
        $pdf->Text(10,$get_Y + 15,'PRECIOS EN : '.$moneda);
    }


    $pdf->Output('I','Ventas_Credito_del_'.$fecha1.'_al_'.$fecha2.'.pdf');



} catch (Exception $e) {

    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Letter');
    $pdf->Text(50,50,'ERROR AL IMPRIMIR');
    $pdf->SetFont('Times','',12);
    $pdf->Output();

}

?>
