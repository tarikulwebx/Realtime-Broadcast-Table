@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 ">
                <table id="orderTable" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        
        // Pusher
        var pusher = new Pusher('7cbb57e2ca490aa99201', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('order-channel');
        channel.bind('order-event', function(data) {
            // alert(JSON.stringify(data));

            $('#orderTable tbody').prepend(
                "<tr class='last-order new-orders'> <td>"+data.id+"</td> <td>"+data.customer+"</td> <td>"+data.product+"</td> <td>"+data.price+"</td></tr>"
            );

            $('.new-orders').css("background", "rgba(162, 230, 133, 0.25)");
            $('.last-order').css("background", "rgb(162, 230, 133)");

            setTimeout(() => {
                $('.new-orders').css("background", "rgba(162, 230, 133, 0.4)");
                $('.new-orders').removeClass("last-order");
            }, 3000);
        });

        var orders;

        axios.get('/getOrders')
        .then(res => {
            orders = res.data;
            console.log(orders);

            $.each(orders, function (index, value) { 
                $('#orderTable tbody').append(
                    "<tr> <td>"+value.id+"</td> <td>"+value.customer+"</td> <td>"+value.product+"</td> <td>"+value.price+"</td></tr>"
                );
            });
        })
        .catch(err => {
            console.error(err); 
        });

        
    </script>
@endsection