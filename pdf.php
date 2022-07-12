<?php

require 'fpdf/fpdf.php';
include 'global/Conexionpdf.php';

date_default_timezone_set('America/Mexico_City'); 
$fecha_actual=date("Y-m-d");


class PDF extends FPDF {

// Cabecera de página

	function Header() {
		$this->SetFont('Times', 'B', 18);
		$this->Image('img/triangulosrecortados.png', 0, 0, 70); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->setXY(60, 35);
		$this->Cell(100, 8, 'EMPACADORA DE CITRICOS DEL TOTONACAPAN SA DE CV', 0, 1, 'C', 0);
        $this->Cell(190, 8, 'Bitacora Diaria', 0, 0, 'C', 0);
		$this->Image('img/logo.jpg', 150, 5, 35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->Ln(40);



	}

// Pie de página

	function Footer() {
		// Posición: a 1,5 cm del final
		$this->SetY(-15);

		$this->SetFont('Arial', 'B', 10);
		// Número de página
		$this->Cell(170, 10, ucwords(strtolower(utf8_decode('Alcibíades Olivar Cárdenas'))), 0, 0, 'C', 0);
		$this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}

// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
	var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 8 * $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w, 8, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h, $setX) {
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			$this->SetFont('Helvetica', 'B', 15);
			$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
			$this->Cell(60, 8, 'Codigo', 1, 0, 'C', 0);
			$this->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
			$this->Cell(35, 8, 'Precio', 1, 1, 'C', 0);
			$this->SetFont('Arial', '', 12);

		}

		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}

	}

	function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}

				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}

		}
		return $nl;
	}
// -----------------------------------TERMINA---------------------------------
}

//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------


$data = new Conexion();
$conexion = $data->conect();
$strquery = "SELECT * FROM reporte WHERE Fecha='$fecha_actual'";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);





//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetX(15);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(40, 8, 'Fecha', 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Vehiculo', 1, 0, 'C', 0);
$pdf->Cell(60, 8, 'Concepto', 1, 0, 'C', 0);
$pdf->Cell(50, 8, 'Estatus', 1, 1, 'C', 0);
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(40, 40, 60 ,50)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','L'));

for ($i = 0; $i < count($data); $i++) {

	$pdf->Row(array($data[$i]['Fecha'], ucwords(strtolower(utf8_decode($data[$i]['Vehiculo']))),ucwords(strtolower(utf8_decode($data[$i]['Concepto']))), ucwords(strtolower(utf8_decode($data[$i]['Estatus'])))), 15);
}

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf_file_name = $fecha_actual.".pdf";
$pdf->Output($pdf_file_name,'I');
?>

