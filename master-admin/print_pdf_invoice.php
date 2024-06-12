<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
include 'dbConfig.php';

class MYPDF extends TCPDF {
    
    //Page header
    public function Header() {
        // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('freesans', '', 9);
        // Title
        $this->Cell(25,5, ' GSTIN : 27ABQPM5427Q1ZR ', 'B', false, '', 0, '', 0, false, 'M', 'M');
        //   $this->Cell(30, 0, 'Top-Center', 0, false, 'C', 0, '', 0, false, 'T', 'C');
        //   $this->Cell(30, 0, 'Center-Center',0, false, 'C', 0, '', 0, false, 'T', 'C');
        //   $this->Cell(30, 0, 'Bottom-Center',0, false, 'C', 0, '', 0, false, 'T', 'C');
        $this->SetFont('freesans', '', 9);
        $this->Cell(95,5, 'TAX INVOICE ', 'B', false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('freesans', '', 9);
        // Title
        //  $this->SetTextColor(209,183,49);
        $this->Cell(0, 5, 'Original For Buyer','B', true, 'R', 0, '', 0, false, 'M', 'M');
        
        $this->SetLineStyle( array( 'width' => 0.40, 'color' => array(0, 0, 0)));
        
        $this->Line(3, 3, $this->getPageWidth()-3, 3);
        
        $this->Line($this->getPageWidth()-3, 3, $this->getPageWidth()-3,  $this->getPageHeight()-3);
        $this->Line(3, $this->getPageHeight()-3, $this->getPageWidth()-3, $this->getPageHeight()-3);
        $this->Line(3, 3, 3, $this->getPageHeight()-3);
    }
    
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-17);
        $this->SetFont('freesans', 'I', 9);
        $this->Cell(0, 2, ' Customer Sign', 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 2, 'For Ganesh Agency ', 0, false, 'R', 0, '', 0, false, 'R', 'R');
        $this->SetY(-8);
        $this->SetX(19);
        // Set font
        $this->SetFont('freesans', 'I', 8);
        // Page number
        $this->Image('logo.png', '', '',5, 5, '', '', 'L', false, 0, '', false, false, 1, false, false, false);
        $this->SetY(-10);
        $this->Cell(0, 10, ' Powered by       P & N Mutke Infotech - 8806530053', 0, false, 'L', 0, '', 0, false, 'T', 'M');
        // $this->Y(-10);
        
        //$this->Cell(15, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'R', 'R');
        
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ganesh Agency');
$pdf->SetTitle('Bill Invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(3,8, 4);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or freesans to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('P', 'A5');

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->SetFont('dejavusans', '', 10, '', true);
// Set some content to prin
$html = <<<EOD
<label style="text-align:center;font-weight:bold;color:#39909e;"><b>Ganesh Agencies</b> </label><br>
<label style="text-align:center;font-size:10px;">Fertilizers,Insecticide & Seed Suppliers</label><br>
<label style="text-align:center;font-size:10px;">Manik Chowk, Chakan,Tal-khed,Dist-Pune</label><br>
<label style="text-align:center;font-size:10px;">Ph No.+91 7276524748, Email:ganesh.agencies.chakan@gmail.com</label><br>
<label style="text-align:center;font-size:10px;">FLZ Lic No : LAFD10100029W, Insecticide Lic No: LAID10100190, Seeds Lic No : LASD10080049</label>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html,'B', 1, 0, true, '', true);

// ---------------------------------------------------------

function fetch_info1()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output1 = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"select * from invoice where id =$id");
    $row = mysqli_fetch_array($query);
    //display the items
    $output1 .= '<p><b>Buyers Name and Address :</b><br> &nbsp;&nbsp;&nbsp;&nbsp;'.$row["name"].'<br> &nbsp;&nbsp;&nbsp;&nbsp;'.$row["addr"].', Tal:'.$row["tal"].'<br> &nbsp;&nbsp;&nbsp;&nbsp;Contact No : '.$row["mobile"].'<br> &nbsp;&nbsp;&nbsp;&nbsp;GSTIN : '.$row["gst"].'<br><br></P>';
    
    return $output1;
}
function fetch_info2()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output2 = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"select * from invoice where id = $id");
    $row = mysqli_fetch_array($query);
    //display the items
    $output2 .= '<span style="font-weight:bold;">Invoice No: IO-2020-'.$row["id"].'</span> <hr><br>Date: '.$row["date"].' <br>Website: www.pnminfotech.com <br>Vehicle No:<br>';
    
    return $output2;
}

$pdf->SetFont('freesans', '', 9);
// create columns content
//$left_column = '<p>Buyers Name and Address :<br> &nbsp;&nbsp;&nbsp;&nbsp;harshada mutke<br> &nbsp;&nbsp;&nbsp;&nbsp;pune,Tal:khed <br> &nbsp;&nbsp;&nbsp;&nbsp;Contact No : +9107896541212 <br> &nbsp;&nbsp;&nbsp;&nbsp;GSTIN : 66543321<br></p>';
$left_column='';
$left_column .= fetch_info1();
$right_column ='';
$right_column .= fetch_info2();

// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// get current vertical position
$y = $pdf->getY();

// set color for background
$pdf->SetFillColor(255, 255, 255);

// write the first column
$pdf->writeHTMLCell(80, '', '', $y, $left_column,'L', 0, 1, true, 'M', false);

// set color for background
$pdf->SetFillColor(255, 255, 255);

// set color for text


// write the second column
$pdf->writeHTMLCell(62, '', '', '', $right_column,'L,R', 1, 1, true, 'J', false);


//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('freesans', '', 9);

// -----------------------------------------------------------------------------

function fetch_data()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=1 order by a.id LIMIT 10");
    
    //display the items
    while($row = mysqli_fetch_array($query)){
        
        
        
        $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    }
    
    return $output;
}

function fetch_data_two()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=2  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_three()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=3  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_four()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=4  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_five()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=5  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_six()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=6  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_7()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=7  order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_8()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn=8 order by a.id LIMIT 10");
    
    //display the items
    $row = mysqli_fetch_assoc($query);
    
    
    
    $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    
    return $output;
}
function fetch_data_9()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id and a.sn >=9  order by a.id LIMIT 10");
    
    //display the items
    while($row = mysqli_fetch_array($query)){
        
        
        
        $output .= '<tr>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["sn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:11px;height:auto">'.$row["display_name"].'<br><font size="7" color="#4f4f4f">'.$row["lot_no"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["hsn"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["product_weight"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["qty"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["single_price"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["cgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["c_amt"].'<br><font size="7" color="#4f4f4f">'.$row["sgst"].'</font></td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto" bgcolor="#F0F0F0">'.$row["unitprice"].'</td>
                          <td height="30px" style="height:30px;border-collapse: collapse;font-size:10px;height:auto">'.$row["rowtotalx"].'</td>
                              
                     </tr>
                          ';
    }
    return $output;
}

$content = '';
$content .= '
<style>
table{
 display: table;
    height: 200px;
    table-layout: fixed;
    
}
td{
 display: table-cell;
    height: 8px;
}
table, th{
background-color:#ADD8E6;
border-right:0.2px solid black;
border-top:0.2px solid black;
border-bottom:0.2px solid black;
border-collapse: collapse;
font-size:10px;
    
}
table, td {
border-right:0.2px solid black;
 border-collapse: collapse;
display:table-row-group
height:100%;
}
.t-table{
    
}
</style>
<table height="500px"  cellpadding="2" cellspacing="0" align="center" style="200px!important;display:table-row-group">
 <tr height="20px">
    <th height="20px" style="width:17px;border-left:1px solid black;"><b>Sr</b></th>
    <th height="20px" style="width:116px;"><b>Product <br><span style="font-size:10px;"> Batch/Exp/Lot</span></b></th>
    <th height="20px" style="width:43px;"><b>Hsn No</b></th>
    <th height="20px" style="width:38px;"><b>Pack</b></th>
    <th height="20px" style="width:28px;"><b>Qty</b></th>
    <th height="20px" style="width:51px;"><b>Price</b></th>
    <th height="20px" style="width:48px;"><b>CGST Rs<br /><span style="font-size:9px;">CGST %</span></b></th>
    <th height="20px" style="width:48px;"><b>SGST Rs<br/><span style="font-size:9px;">SGST %</span></b></th>
    <th height="20px" style="width:49px;" bgcolor="#F0F0F0"><b>Sales Price</b></th>
    <th height="20px" style="width:65px;"><b>Total Amount</b></th>
 </tr>
';
$content .= fetch_data();
$content .= fetch_data_two();
$content .= fetch_data_three();
$content .= fetch_data_four();
$content .= fetch_data_five();
$content .= fetch_data_six();
$content .= fetch_data_7();
$content .= fetch_data_8();
$content .= fetch_data_9();
$content .= '<tr>
                        <td style="height:auto;border-collapse: collapse;"></td>
                         <td style="height:auto;border-collapse: collapse;"></td>
                         <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
                        <td style="height:auto;border-collapse: collapse;border-bottom:1px solid black;" bgcolor="#F0F0F0"></td>
                        <td style="height:auto;border-collapse: collapse;"></td>
    
                     </tr></table>';
$pdf->writeHTML($content,false);

//$pdf->writeHTML($content, true, false, false, false, '');

//$pdf->writeHTMLCell(125,'', '', '','','T', 1, 0, false, 'B', true);
// CGST SGST Calclation





function fetch_cgst1()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"SELECT a.*,sum(a.vatAmountinput) as gst_total,sum(a.rowtotal) as without_gst,sum(a.c_amt) as c_total,sum(a.s_amt) as s_total,b.product_name,b.display_name,c.company_name as c_name,d.totalwithgst FROM product_invoice a,product_details b,product_company c,invoice d where b.company_name=c.id and b.id=a.display_name and d.id=a.q_id and a.product=b.id and a.q_id =$id group by a.vatinput");
    
    //display the items
    while($row = mysqli_fetch_array($query)){
        
        
        
        $output .= '<tr>
                          <td style="padding:2px;font-size:10px;">'.$row["vatinput"].'%</td>
                          <td style="padding:2px;font-size:10px;">'.$row["gst_total"].'</td>
                          <td style="padding:2px;font-size:10px;">'.$row["c_total"].'</td>
                          <td style="padding:2px;font-size:10px;">'.$row["s_total"].'</td>
                          <td style="padding:2px;font-size:10px;">'.$row["without_gst"].'</td>
                              
                              
                     </tr>
                              
                          ';
    }
    return $output;
}
function fetch_calc1()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"select * from invoice where id = $id");
    //display the items
    while($row = mysqli_fetch_array($query)){
        
        
        
        $output .= '<p><b>Total Amount Before Tax : '.$row["totalwithgst"].'</b> <br><span style="font-size:10px;"> Amount SGST : '.$row["totalcgst"].' <br> Amount CGST : '.$row["totalsgst"].'<br> Round OFF (+/-) : '.$row["roundfinalTotal"].' </span> <br><b> Grand Total : '.$row["finalOrderPrice"].'</b></p>
                          ';
    }
    return $output;
}

$pdf->SetFont('freesans', '', 9);
// create columns content
//$left_column = '<p>Buyers Name and Address :<br> &nbsp;&nbsp;&nbsp;&nbsp;harshada mutke<br> &nbsp;&nbsp;&nbsp;&nbsp;pune,Tal:khed <br> &nbsp;&nbsp;&nbsp;&nbsp;Contact No : +9107896541212 <br> &nbsp;&nbsp;&nbsp;&nbsp;GSTIN : 66543321<br></p>';
$left_column1='';
$left_column1='
<table align="center" cellpadding="1">
<tr>
<th style="width:30px;font-size:10px;"><b>GST</b></th>
<th style="width:65px;font-size:10px;"><b>Taxable Amt</b></th>
<th style="width:65px;font-size:10px;"><b>SGST Amt</b></th>
<th style="width:65px;font-size:10px;"><b>CGST Amt</b></th>
<th style="width:58px;font-size:10px;"><b>Tax Amt</b></th>
    
</tr>
';
$left_column1 .= fetch_cgst1();

$left_column1 .= '
</table>';

$right_column2 ='';
$right_column2 .= fetch_calc1();

// set color for background


// set color for background
$pdf->SetFillColor(255, 255, 255);

// write the first column
$pdf->writeHTMLCell(80,'', '', '', $left_column1,'T', 0, 0, true, 'J', true);

$pdf->SetFillColor(192,192,192);

// write the second column
$pdf->writeHTMLCell(62, '', '', '', $right_column2,'T,L,R,B', 1, 1, true, 'J', true);



//$pdf->writeHTMLCell(200, '', '', '', '','L,T', 1, 1, true, 'L', true);


$pdf->SetFont('freesans', '', 9);
// create columns content
//$left_column = '<p>Buyers Name and Address :<br> &nbsp;&nbsp;&nbsp;&nbsp;harshada mutke<br> &nbsp;&nbsp;&nbsp;&nbsp;pune,Tal:khed <br> &nbsp;&nbsp;&nbsp;&nbsp;Contact No : +9107896541212 <br> &nbsp;&nbsp;&nbsp;&nbsp;GSTIN : 66543321<br></p>';

function fetch_unpaid_amount()
{
    include 'dbConfig.php';
    //   $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $mobile=$_REQUEST['mobile'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"select outstanding as unpaid_amt from client where name='$name' and mobile=$mobile");
    //display the items
    
    while($row = mysqli_fetch_array($query)){
        $output .= '<b>Outstanding Amount : '.$row["unpaid_amt"].',</b>';
    }
    return $output;
}
function fetch_word()
{
    include 'dbConfig.php';
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $mobile=$_REQUEST['mobile'];
    $output = '';
    //  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
    //  $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_array($result))
    $query = mysqli_query($conn,"select * from invoice where id=$id");
    $query12 = mysqli_query($conn,"select outstanding as unpaid_amt from client where name='$name' and mobile=$mobile");
    
    $getRow = mysqli_fetch_assoc($query12);
    $row = mysqli_fetch_assoc($query);
    //display the items
    
    //   while($row = mysqli_fetch_array($query)){
    
    
    
    $output .= '<b>Outstanding Amount : '.$getRow["unpaid_amt"].'</b>,<b> Paid Amount : '.$row["paid_amount"].'</b><br>Sales Person : '.$row["sales_person"].'<br><b>Amt in Words : '.$row["inword"].'</b>
                          ';
    //  }
    return $output;
}

$left_column1='';
//$left_column123='';
//$left_column123 .= fetch_unpaid_amount();
$left_column1 .= fetch_word();

$right_column2 ='<p> Bank Name : Union Bank Of India <br> Branch : Chakan <br> A/c No.: 705701010050000 <br> IFSC : ubin0570575';
//$right_column2 .= fetch_calc1();

// set color for background


// set color for background
$pdf->SetFillColor(255, 255, 255);

// write the first column
//$pdf->writeHTMLCell(80, '', '', '', $left_column123,'T', 0, 0, true, 'J', true);
//$pdf->writeHTMLCell(80, '', '', '',$left_column123.$left_column1,'T', 0, 0, true, 'J', true);
$pdf->writeHTMLCell(80, '', '', '',$left_column1,'T', 0, 0, true, 'J', true);

$pdf->SetFillColor(255, 255, 255);

// set color for text


// write the second column
$pdf->writeHTMLCell(62, '', '', '', $right_column2,'L,T,R,B', 1, 0, true, 'J', false);


$pdf->writeHTMLCell(100, '', '', '', '','L,T', 1, 1, true, 'L', true);
//$pdf->writeHTMLCell(92, '2', '', '', 'Customer Sign','L', 0, false, 'L', false);
//Cell(25,5, ' GSTIN : 27ABQPM5427Q1ZR ', 'B', false, '', 0, '', 0, false, 'M', 'M');
//$pdf->writeHTMLCell(50, '2', '', '', 'For Ganesh Agency', 0, 1, false, 'R', 'R');
//$content3 = '';
//$content3 .= '
//<hr>
//';
//->writeHTML($content3);


// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('invoice.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+