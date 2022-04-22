<?php

include_once('libs/fpdf.php');

error_reporting(0); 
$db = new PDO('mysql:host=localhost;dbname=css_db','root',''); 
date_default_timezone_set('Asia/Dhaka');

 
class ticketPDF extends FPDF
{
// Page header
function Header()
    {
        // Logo
        // $this->Image('images/walton.jpg',10,-1,40);
        $this->Image('images/walton.jpg',10,-1,40);
        // $this->Image('images/walton.jpg',10,-1,70);

        $this->SetFont('Arial','B',14);

        // Move to the right
        $this->Cell(80);

        // Title
        // $this->Cell(80,10,'Ticket List',1,0,'C');
        $this->Cell(276,5,'Staff Information',0,0,'C');

        // Line break
        // $this->Ln(20);
        $this->Ln();
        $this->SetFont('Times','',12);

        $this->Cell(276,10,'Dhaka 1230-Basundhara',0,0,'C');
        $this->Ln(20);
    }
 
// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        // $this->SetFont('Arial','I',8);
        $this->SetFont('Arial','',8);

        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(25,10,'SR Number',1,0,'C');
        $this->Cell(60,10,'Name',1,0,'C');
        $this->Cell(35,10,'Contact',1,0,'C');
        $this->Cell(40,10,'Address',1,0,'C');
        $this->Cell(75,10,'Email',1,0,'C');
        $this->Ln();
       
    }

    function viewTable($db){
        $this->SetFont('Times','',12);
        // $stmt = $db->query('SELECT * from staff');
        $stmt = $db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff order by concat(lastname,', ',firstname,' ',middlename) asc");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){

            $srno = ("WDSN00". $data->id);

            $this->Cell(25,10,$srno,1,0,'L');
            $this->Cell(60,10,$data->name,1,0,'L');
            $this->Cell(35,10,$data->contact,1,0,'L');
            $this->Cell(40,10,$data->address,1,0,'L');
            $this->Cell(75,10,$data->email,1,0,'L');
            $this->Ln();

        }
        
    }
}
 

$pdf = new ticketPDF();
//header
$pdf->AddPage('L','A4',0);
//foter page
$pdf->AliasNbPages();
$pdf->headerTable();
$pdf->viewTable($db);

$pdf->SetFont('Arial','B',12);


$pdf->Output();
?>
<!-- $result = mysqli_query($conn, "SELECT id, department_id,firstname,lastname,middlename, contact, address, email, date_created FROM staff") or die("database error:". mysqli_error($conn)); -->