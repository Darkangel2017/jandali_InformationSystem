<?php 
include('connection.php');
session_start();

$sell_date = date('Y/m/d h:i:s', time());
$date = date('d/m/Y', time());

$supplier_id=$_POST['supplier_id'];
$amount_paid=$_POST['amount_paid'];
$total_price=0;
$user_id=$_SESSION['user_id'];
$quantity=0;
$final_price=0;
$q="SELECT quantity as count , item_id FROM `items_in_purchase_cart` ";
// $inv_number=mysqli_fetch_assoc(mysqli_query($conn,$q));
$items_in_cart=mysqli_query($conn,$q);
$image_path=$_POST['image'];
$q="SELECT purchase_id FROM purchase order by purchase_id DESC limit 1";
$invoice_group=mysqli_fetch_assoc(mysqli_query($conn,$q));
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
        <span>Invoice Number: </span><span id="invoice_nb">'.$invoice_group['purchase_id'].'</span><br>
        </div>
        <h3>Purchse Invoice</h3>

        </div>';
        echo '<table id="tablePreview" class="table table-striped">
<thead>
<tr>
<th>Material Description</th>
<th>Code</th>
<th>Item Code</th>
<th>Brand Name</th>
<th>Country of Origin</th>
<th>Quantity</th>
<th>Unit Price(USD)</th>
<th>Total Price</th>
</tr>
</thead>    
<tbody>';

while ($item=mysqli_fetch_assoc($items_in_cart)) {
    $q='SELECT * FROM item WHERE item_id='.$item['item_id'];
    $item_row=mysqli_fetch_assoc(mysqli_query($conn,$q));
    $quantity=$item['count'];
    $total_price=$quantity*$item_row['buying_price'];

    echo '<tr>';
    echo '<td>'.$item_row['name'].'</td>';
    echo '<td></td>';
    echo  '<td>'.$item_row['item_code'].'</td>';
    echo '<td>'.$item_row['brand'].'</td>';
    echo '<td>'.$item_row['country_of_origin'].'</td>';
    echo '<td>'.$quantity.'</td>';
    echo '<td>'.$item_row['selling_price'].'</td>';
    echo '<td>'.$total_price.'</td>';
    echo '</tr>';
    $q="DELETE FROM items_in_purchase_cart WHERE item_id='{$item['item_id']}'";
    mysqli_query($conn,$q);
    $final_price+=$total_price;
    $q="INSERT INTO purchase VALUES (NULL, '{$supplier_id}','{$item_row['item_code']}','{$invoice_group['purchase_id']}', '{$item_row['selling_price']}', '{$quantity}','{$user_id}')";
    if (!mysqli_query($conn,$q))
    {
        echo("Error description: " . mysqli_error($conn));
    }
    $q="UPDATE item SET stock=stock+$quantity WHERE item_id='{$item['item_id']}'";
    mysqli_query($conn,$q);
}
echo ' </tbody>
</table>';
    $q="INSERT into purchase_invoice values(null,'{$invoice_group['purchase_id']}', '{$sell_date}',$amount_paid)";
    mysqli_query($conn,$q);
$supplier_dept=($total_price-$amount_paid);
$q="UPDATE supplier SET balance_usd=balance_usd+$supplier_dept WHERE supplier_id=$supplier_id";
mysqli_query($conn,$q);
$q="UPDATE balance SET balance_usd=balance_usd-{$amount_paid}";
mysqli_query($conn,$q);
$final_price;
echo '<div class="bottom"> 
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
</script>