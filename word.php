<?php

require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\PhpWord;
$phpWord = new PhpWord();
       $dir= __DIR__;
       $doc= 'Отчет.docx';
       $url=$dir.$doc;
       
       $section = $phpWord->addSection(array(
           'orientation' => 'landscape',
           'marginLeft'   => 600,
           'marginRight'  => 600,
           'marginTop'    => 600,
           'marginBottom' => 600,
       ));
        
        
       $section->addTextBreak(1); // перенос строки
       $section->addText("Отчет по выложенным видео с аккаунта - ".$_COOKIE['user']);
        
       $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
       $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
       $cellRowContinue = array('vMerge' => 'continue');
       $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
       $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
        
       $cellHCentered = array('align' => 'center');
       $cellVCentered = array('valign' => 'center');
  
       $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
       $table = $section->addTable('Colspan Rowspan');
       $table->addRow(null, array('tblHeader' => true));
       
        $arr = array('Код видео','Наименование','Описание','Дата','Место','Категория');
        foreach ($arr as &$value) {
		$table->addCell(2000, $cellVCentered)->addText($value, array('bold' => true), $cellHCentered);
		$i=$i+1;
	}
        
        $mysql = new mysqli('localhost','root','','bd_strim');
	$ko=0;
        $arr_s = array();
        $arr_n = array();
        $arr_c = array();
        $arr_i = array();
        $arr_r = array();
        $arr_d = array();
        $arr_x = array();
	$resulta = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC");
	while ($login_s = mysqli_fetch_assoc($resulta)) {
		
                if($_COOKIE['userID'] == $login_s['id_pol']){
                        $arr_s[$ko] = $login_s['id'];
			$arr_n[$ko] = $login_s['name_video'];
                        $arr_c[$ko] = $login_s['opisanie'];
                        $arr_i[$ko]=$login_s['date'];
                        $arr_r[$ko]=$login_s['mesto'];
                        $arr_d[$ko]=$login_s['kategory'];
                        $arr_x[$ko]=$login_s['id_ac'];
                        $ko++;
		}
	}
        $j=0;
        for($i = 0; $i < $ko; $i++){
                $table->addRow();
                for($j = 0; $j < 1; $j++){
                        $table->addCell(2000, $cellVCentered)->addText($arr_s[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_n[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_c[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_i[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_r[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_d[$i], array('bold' => true), $cellHCentered);
                        $table->addCell(2000, $cellVCentered)->addText($arr_x[$i], array('bold' => true), $cellHCentered);
                        
                }
        }
  
        
        $phpWord->save($doc); 
       
       $file = $doc;
       if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        unlink($ur);
        exit;
        
    }

?>