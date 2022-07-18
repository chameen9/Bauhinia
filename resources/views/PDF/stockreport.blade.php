<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <title>Stock Report</title>

        

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
          .success{
            background: #198754;
            color: white;
          }
          .info{
            background: #0dcaf0;
            color: black;
          }
          .warning{
            background: #ffc107;
            color: black;
          }
          .danger{
            background: #dc3545;
            color: white;
          }
        </style>
</head>
<body>
  
  <h3 align="center">Stock Report</h3>
    <p>
      Report Created At  : {{$date}}&nbsp;&nbsp;&nbsp;{{$time}} <br>
      Reprot Created By : {{$name}} ({{$role}})
    </p>
    
    <p>Stock Status : {{$stat}}</p>

  <table cellspacing=0>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price (Rs.)</th>
        <th>Category</th>
        <th>Available Stock</th>
    </tr>

        @foreach($stocks as $stock)
        <tr>
            <td align="center">{{$stock->product_id}}</td>
            <td>{{$stock->product_name}}</td>
            <td align="right">{{$stock->price}}</td>
            <td>{{$stock->category}}</td>
            
            
            @if($stock->stock >= 51)
                <td align="center" class="success">{{$stock->stock}}</td>
            @elseif(50 >= $stock->stock && $stock->stock >= 21)
                <td align="center" class="info">{{$stock->stock}}</td>
            @elseif(20 >= $stock->stock && $stock->stock >= 1)
                <td align="center" class="warning">{{$stock->stock}}</td>
            @elseif(0 >= $stock->stock)
                <td align="center" class="danger">{{$stock->stock}}</td>

            @else

            @endif

        </tr>
        @endforeach
    
   
  </table>
</body>
</html>