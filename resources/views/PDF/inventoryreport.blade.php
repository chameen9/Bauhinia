<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <title>Inventory Report</title>

        

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
  
  <h3 align="center">Inventory Report</h3>
    <p>
      Report Created At  : {{$date}}&nbsp;&nbsp;&nbsp;{{$time}} <br>
      Reprot Created By : {{$name}} ({{$role}})
    </p>
    
    <p>Category : {{$stat}} ({{$resultcount}} Results)</p>

  <table cellspacing=0>
    <tr>
        <th style="padding: 5px;">Product ID</th>
        <th style="padding: 5px;">Product Name</th>
        <th style="padding: 5px;">Brand</th>
        <th style="padding: 5px;">Category</th>
        <th style="padding: 5px;">Price(Rs.)</th>
    </tr>

        @foreach($stocks as $stock)
        <tr>
            <td align="center" style="padding: 5px;">{{$stock->product_id}}</td>
            <td style="padding: 5px;">{{$stock->product_name}}</td>
            <td align="center" style="padding: 5px;">{{$stock->brand}}</td>
            <td style="padding: 5px;">{{$stock->category}}</td>
            <td align="right" style="padding: 5px;">{{$stock->price}}</td>
        </tr>
        @endforeach
    
   
  </table>
</body>
</html>