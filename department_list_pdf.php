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
        $this->Cell(276,5,'Department',0,0,'C');

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
        $this->Cell(10,10,'ID',1,0,'C');
        $this->Cell(45,10,'Subject',1,0,'C');
        $this->Cell(60,10,'description',1,0,'C');
        $this->Cell(20,10,'Status',1,0,'C');
        $this->Cell(25,10,'Department',1,0,'C');
        $this->Cell(25,10,'Customer',1,0,'C');
        $this->Cell(20,10,'Staff',1,0,'C');
        $this->Cell(20,10,'Admin',1,0,'C');
        $this->Cell(20,10,'Supplier',1,0,'C');
        $this->Ln();
       
    }

    function viewTable($db){
        $this->SetFont('Times','',12);
        // $stmt = $db->query('SELECT * from tickets');
        $stmt = $db->query('SELECT * from tickets');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){

            $this->Cell(10,10,$data->id,1,0,'L');
            $this->Cell(45,10,$data->subject,1,0,'L');
            $this->Cell(60,10,$data->description,1,0,'L');
            $this->Cell(20,10,$data->status,1,0,'L');
            $this->Cell(25,10,$data->department_id,1,0,'L');
            $this->Cell(25,10,$data->customer_id,1,0,'L');
            $this->Cell(20,10,$data->staff_id,1,0,'L');
            $this->Cell(20,10,$data->admin_id,1,0,'L');
            $this->Cell(20,10,$data->supplier_id,1,0,'L');
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

// $result = mysqli_query($conn, "SELECT id, name, description, date_created FROM departments") or die("database error:". mysqli_error($conn));