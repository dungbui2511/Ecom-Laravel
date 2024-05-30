<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <div class="row">
               <div class="col-md-6">
                Ordered Details
               </div>
                <div class="col-md-6">
                <a href="{{route('admin.orders')}}" class="btn btn-success pull-right">All Orders</a>
                </div>
               </div>
            </div>
            <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Order ID</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                            <th>Order Id</th>
                            <td>{{$order->id}}</td>
                            <th>Status</th>
                            <td>{{$order->status}}</td>
                            @if($order->status == 'delivered')
                            <th>Delivery Date</th>
                            <td>{{$order->delivered_date}}</td>
                            @elseif($order->status == 'canceled')
                            <th>Cancellation Date</th>
                            <td>{{$order->delivered_date}}</td>
                            @endif
                        </tr>
                    </table>
            </div>
        </div>
    </div>
   </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    All Orders
                </div>
                <div class="panel-body">
                    @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('order_message')}}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zipcode</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>${{$order->subtotal}}</td>
                                <td>${{$order->discount}}</td>
                                <td>${{$order->tax}}</td>
                                <td>${{$order->total}}</td>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->zipcode}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                <td>
                                    <div class="dropdown">
                                    <button class="btn btn-sm btn-success" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>