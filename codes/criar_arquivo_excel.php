function buildExcel(array $header, $content, $sheetName, $fileName)
{

// Incluimos a classe PHPExcel
include($_SERVER['DOCUMENT_ROOT'] . "/ws/assets/Classes/PHPExcel.php");

// Instanciamos a classe
$objPHPExcel = new PHPExcel();

// Definimos o estilo da fonte
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

// Criamos as colunas
$objPHPExcel->setActiveSheetIndex(0)
 	            ->setCellValue('A1', 'Listagem de Credenciamento' )
 	            ->setCellValue('B1', "Nome " )
 	            ->setCellValue("C1", "Sobrenome" )
 	            ->setCellValue("D1", "E-mail" );

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(90);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 2, "Fulano");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 2, " da Silva");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 2, "fulano@exemplo.com.br");


$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 3, "Beltrano");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 3, " da Silva Sauro");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 3, "beltrando@exemplo.com.br");

$objPHPExcel->getActiveSheet()->setTitle('Credenciamento para o Evento');
// Criamos as colunas
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', $header[0] )
			->setCellValue('B1', $header[1] )
			->setCellValue("C1", $header[2] )
			->setCellValue("D1", $header[3] )
			->setCellValue("E1", $header[4] );

// Podemos configurar diferentes larguras paras as colunas como padr�o
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(45);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(45);

$i = 0;

if ($content->num_rows > 0 ) {
	while($row = mysqli_fetch_array($content)){
		while ($i < count($header)){
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i, $row[1]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i, $row[1]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i, $row[1]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i, $row[1]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i, $row[1]);
			$i++;
		}
		$i = 0;
	}
}

// Acessamos o 'Writer' para poder salvar o arquivo
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="teste.xls"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

}

<?php gc::get_footer(); ?>