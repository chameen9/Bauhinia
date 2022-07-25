<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

        <title>Bauhinia | Orders</title>

        <!--Import bootstrap js-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!--X Icon-->
        <link rel = "icon" href = "{{URL::asset('/images/Xicon.ico')}}" type = "image/x-icon">

        <!--Jquery
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        -->

        <!--Import bootstrap css-->
        <link href="/css/bootstrap.css" rel="stylesheet">

        <!--Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    </head>
<body>
    <h3>{{$details['title']}}</h3>
    <p>{{$details['line1']}}</p>
    <p>{{$details['line2']}}</p>
    <p>{{$details['line3']}}</p>

    <h3 class="text-muted">DELIVERY DETAILS</h3>
    <p>Name :   {{$details['name']}}</p>
    <p>Address :   {{$details['address']}}</p>
    <p>Phone :   {{$details['contact']}}</p>
    <p>Email :   {{$details['email']}}</p>
    <p>
        <table border="1px" cellspacing="0">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details['orders'] as $order)
                <tr>
                    <td>{{$order->product_id}}</td>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->qty}}</td>
                    <td>Rs. {{$order->price}}</td>
                    <input type="hidden" name="tot" value="{{$details['total']=$details['total']+$order->qty*$order->price}}">
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"><b>Shipping :</b></td>
                    <td><b>Rs. {{$details['shippingFee']}}.00</b></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Total :</b></td>
                    <td><b>Rs. {{$details['total']+$details['shippingFee']}}</b></td>
                </tr>
            </tbody>
        </table>
       
    </p>
    <p>If you have any problem, contact us through this email. bauhiniaclothings@gmail.com</p>
</body>
</html>