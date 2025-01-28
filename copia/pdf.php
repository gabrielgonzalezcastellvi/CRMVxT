<?php
require 'fpdf/fpdf.php';
date_default_timezone_set("America/Argentina/Mendoza");



$QueryEncrypt = base64_decode($_POST['consulta']);


class PDF extends FPDF
{

    function Header()
    {
        #Image(file, x ,y, weight,height,dpi, formato)
        #$pdf->Image('src',60,30,90,0,'PNG');
        #$this->Image('vxt.png', null, null, 30, 19, 0, 'PNG');
        $this->SetFont('Helvetica', 'B', 10);
        #$this->SetFillColor(255,251,239);//Fondo verde de celda
        $this->Cell(30);
        $this->Cell(120, 10, utf8_decode('Reporte solicitudes | Fecha de impresión: ') . date('d-m-Y'), 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
require './conexion.php';


$resultado = $conexion->query("$QueryEncrypt");


#$pdf = new PDF();
$pdf = new PDF('L', 'mm', 'A4'); // P vertical, L coloca horizontal para q entren todas las celdas

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 9);

$pdf->Cell(25, 10, 'Vendedor', 1, 0, 'C', 0); //(ancho, alto, txt, 1=borde, 0=continua al lado, Centrado,true=dibuja celda)
$pdf->Cell(20, 10, 'Producto', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Linea', 1, 0, 'C', 0);

$pdf->Cell(45, 10, 'Nombre Cliente', 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode('Documento cliente'), 1, 0, 'C', 0);

$pdf->SetFillColor(255, 251, 239);
$pdf->Cell(30, 10, utf8_decode('Plan'), 1, 0, 'C', true);
$pdf->SetFillColor(255, 251, 239);
$pdf->Cell(30, 10, utf8_decode('Score'), 1, 0, 'C', true);


$pdf->Cell(30, 10, utf8_decode('Calle'), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode('Altura'), 1, 1, 'C', 0); // el parametro 1 en cell(x,x,x,x,1,x,x) se coloca en el ultimo valor de la fila para q realice el salto y comience en una nva linea


//declaracion de variables para obtener total fuera del bucle


while ($row = $resultado->fetch_assoc()) {


    //if ($row['descuento'] != NULL) {
        //$SumaDescuentos += $row['descuento'];
    //}

     if(!empty($row['descuento'])){
        $Descuento = $row['descuento'] / 100 * $row['monto'];
        $SumaDescuentos += $Descuento;
      }


    $pdf->Cell(25, 10, utf8_decode($row['vendedor']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['producto']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['linea']), 1, 0, 'C', 0);

    $pdf->Cell(45, 10, utf8_decode($row['nombrecliente']), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($row['documentocliente']), 1, 0, 'C', false);
    if(!empty($row['planes'])){
    $pdf->Cell(30, 10, utf8_decode($row['planes']), 1, 0, 'C', 0);
     }else{
    $pdf->Cell(20, 10, '', 1, 0, 'C', 0);
     }

    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(30, 10, utf8_decode($row['score']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['calle']), 1, 0, 'C', 0); // el parametro 1 en cell(x,x,x,x,1,x,x) se coloca en el ultimo valor de la fila para q realice el salto y comience en una nva linea
    $pdf->Cell(30, 10, utf8_decode($row['numero']), 1, 1, 'C', 0);


}

/* $pdf->Cell(50, 10, 'Total venta: $' . $SumaMontos, 0, 0, 'C', 0);
$pdf->Cell(50, 10, 'Total descuentos: - $' . $SumaDescuentos, 0, 0, 'C', 0);
$pdf->Cell(50, 10, 'Total egresos: - $' . $SumaEgresos, 0, 0, 'C', 0);
$pdf->Cell(50, 10, 'Total final: $' . $total, 0, 1, 'C', 0); */
$user_agent = $_SERVER['HTTP_USER_AGENT'];


function getPlatform($user_agent)
{
    $plataformas = array(
        'Windows 10' => 'Windows NT 10.0+',
        'Windows 8.1' => 'Windows NT 6.3+',
        'Windows 8' => 'Windows NT 6.2+',
        'Windows 7' => 'Windows NT 6.1+',
        'Windows Vista' => 'Windows NT 6.0+',
        'Windows XP' => 'Windows NT 5.1+',
        'Windows 2003' => 'Windows NT 5.2+',
        'Windows' => 'Windows otros',
        'iPhone' => 'iPhone',
        'iPad' => 'iPad',
        'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
        'Mac otros' => 'Macintosh',
        'Android' => 'Android',
        'BlackBerry' => 'BlackBerry',
        'Linux' => 'Linux',
    );
    foreach ($plataformas as $plataforma => $pattern) {
        if (preg_match('/(?i)' . $pattern . '/', $user_agent))
            return $plataforma;
    }
    return 'Otras';
}




$SO = getPlatform($user_agent);

if ($SO == 'Android' || $SO == 'iPhone') {
    $pdf->output('D', 'ReporteVentas.pdf');
} else {
    $pdf->output('D', 'ReporteVentas.pdf');
}
