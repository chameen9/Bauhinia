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
    
    <p>Stock Status : {{$stat}} ({{$resultcount}} Results)</p>

  <table cellspacing=0>
    <tr>
        <th style="padding: 5px;">Product ID</th>
        <th style="padding: 5px;">Product Name</th>
        <th style="padding: 5px;">Price (Rs.)</th>
        <th style="padding: 5px;">Category</th>
        <th style="padding: 5px;">Available Stock</th>
    </tr>

        @foreach($stocks as $stock)
        <tr>
            <td align="center" style="padding: 5px;">{{$stock->product_id}}</td>
            <td style="padding: 5px;">{{$stock->product_name}}</td>
            <td align="right" style="padding: 5px;">{{$stock->price}}</td>
            <td style="padding: 5px;">{{$stock->category}}</td>
            
            
            @if($stock->stock >= 51)
                <td align="center" class="success" style="padding: 5px;">{{$stock->stock}}</td>
            @elseif(50 >= $stock->stock && $stock->stock >= 21)
                <td align="center" class="info" style="padding: 5px;">{{$stock->stock}}</td>
            @elseif(20 >= $stock->stock && $stock->stock >= 1)
                <td align="center" class="warning" style="padding: 5px;">{{$stock->stock}}</td>
            @elseif(0 >= $stock->stock)
                <td align="center" class="danger" style="padding: 5px;">{{$stock->stock}}</td>

            @else

            @endif

        </tr>
        @endforeach
    
   
  </table>
</body>
</html>