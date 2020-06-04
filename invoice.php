<?php
require_once('connection.php');
$q="SELECT * FROM items_in_sell_cart";
$date = date('d/m/Y', time());
$sell_date = date('Y/m/d h:i:s', time());
// $q="SELECT `items_in_cart_id` From `items_in_sell_cart` ORDER BY `items_in_cart_id` DESC LIMIT 1 ";
// $inv_number=mysqli_fetch_assoc(mysqli_query($conn,$q));
$client_id=$_POST['client_id'];
$amount_paid=$_POST['amount_paid'];
$image_path=$_POST['image'];
$q="SELECT * FROM client WHERE client_id='{$client_id}'";
$row_client=mysqli_fetch_assoc(mysqli_query($conn,$q));
$final_price=0;
$q="SELECT * FROM items_in_sell_cart";
$items_in_cart=mysqli_query($conn,$q);
//getting a invoice group by inserting a fake sell
$q="SELECT sell_id FROM sell order by sell_id DESC limit 1";
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
  <h3 style="margin-left:40%; font-size:2.2em"> Purchase Invoice</h3>
            <div class="invoiceinfo">
            <span>Invoice Date: </span><span id="invoice_date">'.$date.'</span><br>
            <span>Invoice Number: </span><span id="invoice_nb">'.$invoice_group['sell_id'].'</span><br>
            </div>
            <section class="information">
            <h3>Buyer Information</h3>
            <span>Customer record No.:</span><span id="customer_record_nb"></span><br>
            <span>Hospital/Company Name:</span><span id="company_name">'.$row_client['name'].'</span><br>
            <span class>Address:</span><span id="address">'.$row_client['address'].'</span><br>
            <span class>Phone Number:</span><span id="phone_number">'.$row_client['phone_number'].'</span><br>
            <span>Number and Date of Purchase Request:</span><span id="date"></span><br>
            <span class>Payment Method:</span><span id="payment_method">Cash/Check</span>
            </section>
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
        echo '<tr>';
        $q='SELECT * FROM item WHERE item_id='.$item['item_id'];
        $item_row=mysqli_fetch_assoc(mysqli_query($conn,$q));
        $quantity=$item['quantity'];
        $total_price=$quantity*$item_row['selling_price'];
        $final_price+=$total_price;
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
        $q="INSERT INTO sell VALUES (NULL, '{$client_id}','{$item_row['item_code']}', '{$invoice_group['sell_id']}' , '{$item_row['selling_price']}','{$quantity}')";
        mysqli_query($conn,$q);
        $q="DELETE FROM items_in_sell_cart WHERE item_id='{$item['item_id']}'";
        mysqli_query($conn,$q);
        $q="UPDATE item SET stock=stock-$quantity WHERE item_id='{$item['item_id']}'";
        mysqli_query($conn,$q);
      }
      
      echo ' </tbody>
      </table>';
      $discount_amount=$final_price*($row_client['discount']/100);
      $final_price_with_disc=$final_price-$discount_amount;
      $client_debt=($final_price_with_disc-$amount_paid);
      $q="UPDATE client SET balance_usd=balance_usd+$client_debt WHERE client_id=$client_id";
      mysqli_query($conn,$q);
      $q="UPDATE balance SET balance_usd=balance_usd+$amount_paid";
      mysqli_query($conn,$q);
      echo '<div class="bottom">
      <span> Financial Extras: </span><span id="financial_extras">00.00</span><br>
      <span> Total Price : </span><span id="deduction">'.$final_price.' $ </span><br>
      <span> Discount: </span><span id="deduction">'.$row_client['discount'].' % </span><br>
      
      <span> Overall Total: </span><span id="overall_total">  '.$final_price_with_disc.' $</span><br>
      <span id="overall_total"> Only '.number_to_word($final_price_with_disc).' USD</span><br>
      </div>';
      $q="INSERT INTO sell_invoice VALUES (NULL,'{$invoice_group['sell_id']}','{$sell_date}',$final_price)";
      mysqli_query($conn,$q);

  echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
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