<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <title>Income Report</title>

        

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
  
  <h3 align="center">Income Report</h3>
    <p>
      Report Created At  : {{$date}}&nbsp;&nbsp;&nbsp;{{$time}} <br>
      Reprot Created By : {{$name}} ({{$role}})
    </p>
    
    <p>Month : {{$month}}</p>

    <p>
        @foreach($products as $product)
            <input type="hidden" name="totamount" value="{{$totamount = $totamount+$product->qty*$product->price}}">
        @endforeach

        Total Orders : <b>{{$totorders}}</b> <br>
        Total Amount : <b>Rs. {{$totamount}}</b>
        
    </p>

            <h4>Pending Orders</h4>
    
            <table cellspacing=0>
                    <tr class="table-primary">
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Status</th>
                        <th>Product Price (Rs.)</th>
                        <th>Quantity</th>
                        <th align="right">Order value (Rs.)</th>
                    </tr>
                    @foreach($products as $product)
                        @if($product->status == 'Pending')
                        
                        <tr>
                            <td align="center">{{$product->order_id}}</td>
                            <td align="center">{{$product->product_id}}</td>
                            <td align="center">{{$product->status}}</td>
                            <td align="right">{{$product->price}}</td>
                            <td align="center">{{$product->qty}}</td>
                            <td align="right">{{$product->qty*$product->price}}</td>
                        </tr>
                        @endif
                    @endforeach
                    <tr>
                        @foreach($products as $product)
                            @if($product->status == 'Pending')
                                <input type="hidden" name="tot" value="{{$pendingtot = $pendingtot+$product->qty*$product->price}}">
                            @endif
                        @endforeach
                        <td colspan="5" align="right"><b>Total : Rs. {{$pendingtot}}</b></td>
                    </tr>
            
            </table>
            <br>

            <h4>Shipped Orders</h4>
    
            <table cellspacing=0>
                    <tr class="table-primary">
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Status</th>
                        <th>Product Price (Rs.)</th>
                        <th>Quantity</th>
                        <th align="right">Order value (Rs.)</th>
                    </tr>
                    @foreach($products as $product)
                        @if($product->status == 'Shipped')
                        
                        <tr>
                            <td align="center">{{$product->order_id}}</td>
                            <td align="center">{{$product->product_id}}</td>
                            <td align="center">{{$product->status}}</td>
                            <td align="right">{{$product->price}}</td>
                            <td align="center">{{$product->qty}}</td>
                            <td align="right">{{$product->qty*$product->price}}</td>
                        </tr>
                        @endif
                    @endforeach
                    <tr>
                        @foreach($products as $product)
                            @if($product->status == 'Shipped')
                                <input type="hidden" name="tot" value="{{$shippedtot = $shippedtot+$product->qty*$product->price}}">
                            @endif
                        @endforeach
                        <td colspan="5" align="right"><b>Total : Rs. {{$shippedtot}}</b></td>
                    </tr>
            
            </table>
            <br>

            <h4>Completed Orders</h4>
    
            <table cellspacing=0>
                    <tr class="table-primary">
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Status</th>
                        <th>Product Price (Rs.)</th>
                        <th>Quantity</th>
                        <th align="right">Order value (Rs.)</th>
                    </tr>
                    @foreach($products as $product)
                        @if($product->status == 'Completed')
                        
                        <tr>
                            <td align="center">{{$product->order_id}}</td>
                            <td align="center">{{$product->product_id}}</td>
                            <td align="center">{{$product->status}}</td>
                            <td align="right">{{$product->price}}</td>
                            <td align="center">{{$product->qty}}</td>
                            <td align="right">{{$product->qty*$product->price}}</td>
                        </tr>
                        @endif
                    @endforeach
                    <tr>
                        @foreach($products as $product)
                            @if($product->status == 'Completed')
                                <input type="hidden" name="tot" value="{{$completedtot = $completedtot+$product->qty*$product->price}}">
                            @endif
                        @endforeach
                        <td colspan="5" align="right"><b>Total : Rs. {{$completedtot}}</b></td>
                    </tr>
            
            </table>
            
          
</body>
</html>