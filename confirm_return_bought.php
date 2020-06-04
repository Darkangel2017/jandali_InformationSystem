<?php
require_once 'connection.php';
$image_path=$_POST['image'];
$sell_date = date('Y/m/d h:i:s', time());
$date = date('d/m/Y', time());
$invoice_group=$_POST['invoice_group'];
$q="SELECT invoice_id FROM purchase_invoice order by invoice_id DESC limit 1";
$invoice_group_for_number=mysqli_fetch_assoc(mysqli_query($conn,$q));
$final_price=0;
$q="SELECT * from purchase where invoice_group='{$invoice_group}'";
$purchse_result=mysqli_query($conn,$q);
$i=0;
echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <link rel="stylesheet" href="css/invoice.css">
        <link href="css/googleapis_font.css" rel="stylesheet">
        <link rel="stylesheet" href="css/w3schools_invoice.css">
        <link rel="stylesheet" href="css/fontawesome_invoice.css">
        <link rel="stylesheet" href="css/bootstrap_invoice.css">

</head>
<body>
  <nav>';
  echo '<img src="'.$image_path.'" id="company_logo" style="width: 27em; height: 16em;" alt="Company Logo" class="icon">';
   echo' <div class="companyinfo">
        <span>Address: </span><span
        id="company_address">LEBANON-TRIPOLI<br>Boulivar Street<br>Front of Galatasaray vs Goovernment<br>
        Massoud Building<br>6 Floor<br>Te;: 009616427054<br>Mobile phone<br>0096171690120<br>0096170210918<br>Email:<br>hj.zimed.lebanon@hotmail.com<br>Financial Number : 3122468</span><br>
        </div>
        </nav>';
        echo ' <div class="container">
        <div class="invoiceinfo">
        <span>Invoice Date: </span><span id="invoice_date">'.$date.'</span><br>
        <span>Invoice Number: </span><span id="invoice_nb">'.$invoice_group_for_number['invoice_id'].'</span><br>
        </div>
        
        <h3>Return Invoice</h3>
        </div>';
echo '<table id="tablePreview" class="table table-striped">
<thead>
<tr>
<th>Item Code</th>
<th>Brand Name</th>
<th>Country of Origin</th>
<th>Returned Quantity</th>
<th>Unit Price(USD)</th>
<th>Total Price</th>
</tr>
</thead>    
<tbody>';
// table goes here 
while ($row=mysqli_fetch_assoc($purchse_result)) {
if($_POST['quantity_returned'][$i]!=0){
 $item_code=$_POST['item_code'][$i];
 $q="SELECT * from item where item_code=$item_code";
 $item=mysqli_fetch_assoc(mysqli_query($conn,$q));
 $total_price=$item['selling_price']*$_POST['quantity_returned'][$i];
 $quantity_returned=$_POST['quantity_returned'][$i];
 $purchase_id=$_POST['purchase_id'][$i];
 $supplier_id=$_POST['supplier_id'][$i];
 echo '<tr>';
 echo '<td>'.$item['item_code'].'</td>';
 echo '<td>'.$item['brand'].'</td>';
 echo '<td>'.$item['country_of_origin'].'</td>';
 echo '<td>'.$quantity_returned.'</td>';
 echo '<td>'.$item['selling_price'].'</td>';
 echo '<td>'.$total_price.'</td>';
 $final_price+=$total_price;
 echo '</tr>';

    $q="UPDATE purchase set quantity=quantity-'{$quantity_returned}' WHERE purchase_id='{$purchase_id}'";
    mysqli_query($conn,$q);
    $q="UPDATE supplier set balance_usd=balance_usd-'{$final_price}' where supplier_id='{$supplier_id}'";
    mysqli_query($conn,$q);
    $q="UPDATE item set stock=stock-'{$quantity_returned}' where item_code=$item_code";
    mysqli_query($conn,$q);
}
    $i++;
}

echo '
</tbody>
</table>
<div class="bottom"> 
<span> Overall Total: </span><span id="overall_total">  '.$final_price.' $</span><br>
<span id="overall_total"> Only '.number_to_word($final_price).' USD</span><br>
</div>';



 echo '
</body>

</html>';


function number_to_word( $num = '' )
{
    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
        if( $commas )
        {
            $words  = str_replace_last( ',' , ' and' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}

function trim_all( $str , $what = NULL , $with = ' ' )
{
    if( $what === NULL )
    {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space
       
        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }
   
    return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}

function str_replace_last( $search, $replace, $subject ) {
  if ( !$search || !$replace || !$subject )
      return false;
  
  $index = strrpos( $subject, $search );
  if ( $index === false )
      return $subject;
  
  // Grab everything before occurence
  $pre = substr( $subject, 0, $index );
  
  // Grab everything after occurence
  $post = substr( $subject, $index );
  
  // Do the string replacement
  $post = str_replace( $search, $replace, $post );
  
  // Recombine and return result
  return $pre . $post;
}
?>
<script>
  window.onload = function () { 
 window.print();
   }
   window.onbeforeunload = function() {
        return "You Can't Refresh the page!";
    }
</script>