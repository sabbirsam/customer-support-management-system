<?php

include_once('libs/fpdf.php');

error_reporting(0); 
$db = new PDO('mysql:host=localhost;dbname=css_db','root',''); 
date_default_timezone_set('Asia/Dhaka');

$dates_string_from=$_POST['date_string_from'];
// print_r($dates_string_from);

$dates_string_to=$_POST['date_string_to'];

class ticketPDF extends FPDF
{
// Page header
function Header()
    {
        $today = date("Y/m/d");

        // Logo
        // $this->Image('images/walton.jpg',10,-1,40);
        $this->Image('images/walton.jpg',10,-1,40);
        // $this->Image('images/walton.jpg',10,-1,70);

        $this->SetFont('Arial','B',14);

        // Move to the right
        $this->Cell(80);

        // Title
        // $this->Cell(80,10,'Ticket List',1,0,'C');
        $this->Cell(276,5,'Ticket List',0,0,'C');

        // Line break
        // $this->Ln(20);
        $this->Ln();
        $this->SetFont('Times','',12);

        $this->Cell(276,10,"Dhaka 1230-Basundhara. Date: $today",0,0,'C');
        // $this->Cell(276,10,"$today",0,0,'C');
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
        $this->Cell(45,10,'User Name',1,0,'C');
        $this->Cell(60,10,'Subject',1,0,'C');
        $this->Cell(90,10,'description',1,0,'C');
        // $this->MultiCell(60,10,'description','LRTB','L','false');
        $this->Cell(20,10,'Status',1,0,'C');
        $this->Cell(40,10,'Date',1,0,'C');
        $this->Ln();
       
    }

    function viewTable($db){

        $dates_string_from=$_POST['date_string_from'];
        $dates_string_to=$_POST['date_string_to'];

        $this->SetFont('Times','',12);

        /**
         * Main
         */
        // $stmt = $db->query("SELECT * FROM tickets WHERE date_created between '$dates_string_from' and '$dates_string_to' AND (hour(date_created) >= 19 or hour(date_created) < 7) ");//most accurate main 
        // $stmt = $db->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id WHERE t.date_created between '$dates_string_from' and '$dates_string_to' ");//main 
        // $stmt = $db->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id WHERE t.date_created between '$dates_string_from' and '$dates_string_to' and (hour(t.date_created) >= 19 or hour(t.date_created) < 7) ");//main 
        // $stmt = $db->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id WHERE t.date_created between '$dates_string_from' and '$dates_string_to' and (hour(t.date_created) >= 01 or hour(t.date_created) < 24) ");//main 
        $stmt = $db->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id WHERE t.date_created between '$dates_string_from' and '$dates_string_to' or (hour(t.date_created) >= 10 and minute(t.date_created) >30 and second(t.date_created) >00) ");//main 

        while($data = $stmt->fetch(PDO::FETCH_OBJ)){


            $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
            unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
            $desc = strtr(html_entity_decode($data->description),$trans);
            $desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
            $descriptions =  strip_tags($desc);

            $date = date("d M, Y",strtotime($data->date_created));
            $srno = ("WDCN00". $data->id);


            if($data->status =='0' ){
                $a = "Submitted";
    
            }elseif($data->status =='1'){
                $a = "processing";
            }else{
                $a = "Complete";
            } 


            // $this->Cell(10,10,$data->id,1,0,'L');
            $this->Cell(25,10,$srno,1,0,'L');
            $this->Cell(45,10,$data->cname,1,0,'L');
            $this->Cell(60,10,$data->subject,1,0,'L');
            // $this->Cell(60,10,$data->description,1,0,'L');

            $this->Cell(90,10, $descriptions,1,0,'L');
            $this->Cell(20,10,$a,1,0,'L');
            // $this->Cell(40,10,$data->date_created,1,0,'L');
            $this->Cell(40,10,$date,1,0,'L');
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