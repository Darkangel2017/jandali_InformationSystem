<?php
function print_invoice(){
?>  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
    <nav>
      <img src="Images/icon.ico" id="company_logo" alt="Company Logo" class="icon">
      <div class="companyinfo">
        <span>Address: </span><span
          id="company_address"><br>Bolivar
          Street<br>Front of Galatasaray vs Government<br>Massoud Building 6th Floor</span><br>
        <span>Tel.:</span><span id="company_telnumber">0096106427054</span><br>
        <span>Mobile: </span><span id="company_mobilenumber">0096106427054<br>0096106427054</span><br>
        <span>Email: </span><span id="company_email">ballouta@hotmail.com</span><br>
        <span>Financial Number: </span><span id="company_financialnumber">3122400</span>
      </div>
    </nav>
    <div class="container">
      <div class="invoiceinfo">
        <span>Invoice Date: </span><span id="invoice_date">17/07/2019</span><br>
        <span>Invoice Number: </span><span id="invoice_nb">403</span><br>
      </div>
      <section class="information">
        <h3>Buyer Information</h3>
        <span>Customer record No.: </span><span id="customer_record_nb">123</span><br>
        <span>Hospital/Company Name: </span><span id="company_name">Haykal Hospital</span><br>
        <span class>Address: </span><span id="address">Tripoli, Lebanon</span><br>
        <span class>Phone Number: </span><span id="phone_number">06001100</span><br>
        <span class>Mobile Number: </span><span id="mobile_number">03001100</span><br>
        <span>Number and Date of Purchase Request: </span><span id="date">123456</span><br>
        <span class>Payment Method: </span><span id="payment_method">Cash/Check</span>
      </section>
    </div>
    <table id="tablePreview" class="table table-striped">
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
      <tbody>
        <tr>
          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>
          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>
          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>
          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
        <tr>

          <td>Cumilated herbert screw 3.0mm 10mm</td>
          <td>DOIT.181180</td>
          <td></td>
          <td></td>
          <td></td>
          <td>2</td>
          <td>35.00</td>
          <td>70.00</td>
        </tr>
      </tbody>
    </table>
    <div class="bottom">
      <span> Financial Extras: </span><span id="financial_extras">3275.00</span><br>
      <span> Deduction: </span><span id="deduction">None</span><br>
      <span> Overall Total: </span><span id="overall_total">68000 LBP</span><br>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
  </body>

  </html>


<?php
}
?>
<?php function print_proforma_invoice(){?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proforma Invoice</title>
    <link rel="stylesheet" href="css/proformainvoice.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
    <nav>
      <img src="Images/icon.ico" id="company_logo" alt="Company Logo" class="icon">
    </nav>
    <h3>Proforma Invoice</h3>
    <table id="tablePreview1" class="table table-striped">
      <thead>
        <tr>
          <th>Quotation Number</th>
          <th>Quotation Date</th>
          <th>Supplier Name</th>
          <th>Supplier Address</th>
          <th>Supplier Phone Number</th>
          <th>Supplier Fax Number</th>
          <th>Hospital Name</th>
          <th>Hospital Address</th>
          <th>Hospital Phone Number</th>
          <th>Patient Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>MSORTH5-125</td>
          <td>004-0310-016</td>
          <td>Elastic Nail</td>
          <td>MAT</td>
          <td>Germany</td>
          <td>1</td>
          <td>Ballout</td>
          <td>Riz</td>
          <td>68000</td>
          <td>68000</td>
        </tr>
      </tbody>
    </table>

    <table id="tablePreview" class="table">
      <thead>
        <tr>
          <th>CNSS Code</th>
          <th>Item Code</th>
          <th>Implants Description</th>
          <th>Brand Name</th>
          <th>Country of Origin</th>
          <th>Quantity</th>
          <th>CNSS Unit Approved Price(LBP)</th>
          <th>CNSS Total Approved Price(LBP)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>MSORTH5-125</td>
          <td>004-0310-016</td>
          <td>Elastic Nail</td>
          <td>MAT</td>
          <td>Germany</td>
          <td>1</td>
          <td>68000</td>
          <td>68000</td>
        </tr>
      </tbody>
    </table>
    <div class="bottom">
      <span> Overall Total: </span><span id="overall_total">68000 LBP</span><br>
      <span id="overall_text">Only Sixty Eight Thousand Lebanese Pounds</span><br>
      <span>FDA And CE Approved</span>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
  </body>

  </html>
<?php }?>
<?php function print_delivery_statement(){ ?> <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/deliveryStatement.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="parent">
<div class="logo">
  <img src="Images/icon.ico" alt="Company Logo">
</div>
<div class="main">
  <h1>Delivery Statement</h1>
  <h2>Information</h2><br>
  <span class="text">Email: </span><span id="email">hj.zimed.lebanon@hotmail.com</span><br>
  <span class="text">Tel. Number: </span><span id="phone_number">00961001110</span><br>
  <span class="text">Office Phone Number: </span><span id="office_phone_number">00961110001</span><br>
  <span class="text">Name: </span><span id="name">Mr. Pasckal Sader</span><br>
  <span class="text">Date: </span><span id="date">28/09/2019</span>
</div>
<div class="table">
  <table id="tablePreview" class="table table-striped">
    <thead>
      <tr>
        <th>Delivery Date</th>
        <th>Code</th>
        <th>Material</th>
        <th>Description</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Unit Price(USD)</th>
        <th>Total Price(USD)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>
        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>
        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>
        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
      <tr>

        <td>Cumilated herbert screw 3.0mm 10mm</td>
        <td>DOIT.181180</td>
        <td></td>
        <td></td>
        <td></td>
        <td>2</td>
        <td>35.00</td>
        <td>70.00</td>
      </tr>
    </tbody>
  </table>
  <div class="totalorder">
    <span>Total Order: </span><span id="total_order">3275.00</span><br>
</div>
</div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
</body>
</html>
<?php } ?>
