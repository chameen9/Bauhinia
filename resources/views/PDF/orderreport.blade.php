<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <title>Order Report</title>

        

        <style>
          table{
            border: 1px solid black;
            width: 100%;
            
          }
          th{
            background: #A8D1DF;
            color: black;
            border: 1px solid black;
          }
          tr{
            background: white;
            color: black;
            border: 1px solid black;
          }
          td{
            background: white;
            color: black;
            border: 1px solid black;
          }
        </style>
</head>
<body>
  
  <h3 align="center">Order Report</h3>
    <p>
      Report Created At  : {{$createddate}}&nbsp;&nbsp;&nbsp;{{$createdtime}} <br>
      Reprot Created By : {{$name}} ({{$role}})
    </p>
    
    <p>Report Type : {{$date}}-{{$stat}} ({{$resultcount}} Orders)</p>

  <table cellspacing=0>
    <tr>
        <th style="padding: 5px;">Order ID</th>
        <th style="padding: 5px;">Product ID</th>
        <th style="padding: 5px;">Customer Name</th>
        <th style="padding: 5px;">Pr.Contact</th>
        <th style="padding: 5px;">Se.Contact</th>
        <th style="padding: 5px;">Address</th>
        <th style="padding: 5px;">Qty</th>
        <th style="padding: 5px;">Order Value (Rs.)</th>
    </tr>

        @foreach($orders as $order)
        <tr>
            <td align="center" style="padding: 5px;">{{$order->order_id}}</td>
            <td align="center" style="padding: 5px;">{{$order->product_id}}</td>
            <td style="padding: 5px;">{{$order->cus_name}}</td>
            <td style="padding: 5px;">{{$order->primary_contact}}</td>
            <td style="padding: 5px;">{{$order->secondary_contact}}</td>
            <td style="padding: 5px;">{{$order->delivery_address}}</td>
            <td align="center" style="padding: 5px;">{{$order->qty}}</td>
            <td align="right" style="padding: 5px;">{{$order->qty*$order->price}}</td>
        </tr>
        @endforeach
    
   
  </table>
</body>
</html>