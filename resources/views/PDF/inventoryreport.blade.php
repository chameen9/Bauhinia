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
    
    <p>Category : {{$stat}}</p>

  <table cellspacing=0>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Price(Rs.)</th>
    </tr>

        @foreach($stocks as $stock)
        <tr>
            <td align="center">{{$stock->product_id}}</td>
            <td>{{$stock->product_name}}</td>
            <td align="center">{{$stock->brand}}</td>
            <td>{{$stock->category}}</td>
            <td align="right">{{$stock->price}}</td>
        </tr>
        @endforeach
    
   
  </table>
</body>
</html>