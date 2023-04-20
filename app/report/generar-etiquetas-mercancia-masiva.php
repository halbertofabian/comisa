<?php ob_start();
include_once '../../config.php';
require_once('../lib/TCPDF/tcpdf.php');

require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.modelo.php';


class imprimirFactura
{

    public $prm_id;
    public $tipo;

    public function imprimirEtiqueta()
    {
        $etiquetas = AlmacenesModelo::mdlMostrarSeriesByPrmId($this->prm_id);

        $pageLayout = array(210, 80); //  or array($height, $width) 

        $pdf = new TCPDF('P', 'mm', $pageLayout, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('');
        $pdf->SetSubject('');
        $pdf->SetKeywords('');
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(0, 0, 0, 0);
        $pdf->SetMargins(0, 0, 0, 0);
        // $pdf->setPrintHeader(false);
        $pdf->SetFooterMargin(0);
        // $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', '', 6, '', true);
        // $pdf->AddPage('L','mm',array(80,230));
        $pdf->SetAutoPageBreak(TRUE, 0);

        $style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => '0',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 6,
            'stretchtext' => 6
        );
        $pdf->AddPage();

        foreach ($etiquetas as $key => $spds) {

            $pdf->writeHTMLCell(0, 0, '', '', '<br><br>', 0, 1, 0, true, '', true);
            $pdf->writeHTMLCell(0, 0, '', '', '<div style="text-align:center; font-size:10px">' . $spds['mpds_descripcion'] . ' - ' . $spds['mpds_modelo'] . '</div>', 0, 1, 0, true, '', true);
            $pdf->write1DBarcode($spds["mpds_suc"] . "" . $spds['mpds_modelo'] . "" . $spds['spds_serie'], 'C128', '', '', '', 6 * 2, 6 * 2, $style, 'N');
            $pdf->writeHTMLCell(0, 0, '', '', '<br><br>', 0, 1, 0, true, '', true);
            # code...
        }


        // Add a page
        // This method has several options, check the source code documentation for more information.

        ob_end_clean();
        $pdf->Output('etiquetas.pdf', 'I');
    }
}

$etiqueta_pds = new imprimirFactura();
$etiqueta_pds->prm_id = $_GET["prm_id"];
$etiqueta_pds->imprimirEtiqueta();
