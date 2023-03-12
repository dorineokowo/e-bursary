<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require 'server.php';
include_once('fpdf/fpdf.php');
ob_start();
$regno = $_SESSION['username'];


   $today=Date('jS F, Y');
//    $conn=mysqli_connect("localhost","brian","brian","e-bursary") or die(mysqli_error($conn));
//    $conn=mysqli_connect("localhost","emmanuel","wanyonyi","blinxcok_e-bursary") or die(mysqli_error($conn));

    
$strSQL= "SELECT * from loanDetails where regNumber='$regno' ";
	   $query = mysqli_query($db,$strSQL);
	   $num=mysqli_num_rows($query);
	   if($num==0)
	 {
	 $data[]='';
	 }
	 else{
	    for($i=0; $i<$num; $i++)
	 {
	 $row=mysqli_fetch_array($query);
	 $data[]=array($index=$i+1,$reg=$row['regNumber'],$app=$row['applicationStatus'],$amnt=$row['amountAllocated'],$chq=$row['chequeNumber'],$pay=$row['paymentStatus'],$date=$row['date_processed']);
	 }
	 }
class PDF extends FPDF
{

function Header()
{
    //$this->Image('logo.png', 88,6,30);
    //$this->Image('sirisia.png', 88,6,30);
    $this->Ln(35);
	
    $this->SetFont('Arial','',15);
	$this->Cell(0,6,'SIRISIA CONSTITUENCY',0,1,'C');
	$this->Ln(8);
	//$this->SetX(140);
    $this->SetFont('Arial','B',10);
	$this->SetX(140);
	$this->Cell(40,4,'Print Date: '.Date('jS F, Y.'),0, 0, 'L');
	$this->Ln(5);
    $this->SetFont('Arial','',10);
	$this->Cell(200,4,'Bursary Application Details','C');
	
	$this->Ln(10);
    
	parent::Header();
}

//Page footer
function Footer()
{
  $this->SetY(-15);
  $this->SetFont('Arial', 'I', 8);
  $this->Cell(0, 10, 'Sirisia Constituency  ', 0, 0, 'C');
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


function BuildTable($header,$data) {

        //Colors, line width and bold font
        $this->SetX(15);
        $this->SetFillColor(255,0,0);

        $this->SetTextColor(255);

        $this->SetDrawColor(128,0,0);

        $this->SetLineWidth(.3);

        $this->SetFont('','B');
       
        //Header

        // make an array for the column widths
        
        $w=array(10,30,30,15,30,38,35);

        // send the headers to the PDF document
        //$this->SetX(25);
        for($j=0;$j<count($header);$j++)
       //$this->SetX(25);
        $this->Cell($w[$j],7,$header[$j],1,0,'C',1);

        $this->Ln();

        //Color and font restoration
       
        $this->SetFillColor(175);

        $this->SetTextColor(0);
        
        $this->SetFont('');
       //now spool out the data from the $data array

        $fill=true; // used to alternate row color backgrounds
          $this->SetX(15);
        foreach($data as $row)

        {
		$this->SetX(15);
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
       // set colors to show a URL style link

        //$this->SetTextColor(0,0,255);

        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
         
        // restore normal color settings

        $this->SetTextColor(0);

        $this->SetFont('');

        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
        $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
        $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
        $this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
		$this->Ln();
        $this->SetX(15);
        // flips from true to false and vise versa

        $fill =! $fill;

        }

        $this->Cell(array_sum($w),0,'','T');

        }

}

$pdf=new PDF();
$pdf->AliasNbPages();
$header=array('Index','Registration NO.', 'Application Status','Amount','Cheque Number', 'Payment Status','Date Processed');
$pdf->SetFont('Arial','',8);

$pdf->AddPage();

$pdf->BuildTable($header,$data);

$pdf->Output('file.pdf','I');

?>