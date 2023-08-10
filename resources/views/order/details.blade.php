@extends('partials.app')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-plus-square">
                    </i>
                </div>
                <div style="font-variant: small-caps"><b> Order Details </b></div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('order.index')}}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fas fa-arrow-circle-left"> </i>
                    Back to list
                </a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('order.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Order Summary </h5>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">S/L</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Discount</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>#{{$order->invoice_id}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->subtotal}}</td>
                                        <td>{{$order->has_discount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Item List <small class="badge badge-secondary">{{$order->details->count()}} Item</small></h5>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->details as $orders)
                                    <tr>
                                        <td>
                                            <img src="{{asset($orders->product->image)}}" alt="" width="50px">
                                        </td>
                                        <td>{{$orders->product->name}}</td>
                                        <td>{{$orders->variant->product_price}}</td>
                                        <td>{{$orders->quantity}}</td>
                                        <td>{{$orders->variant->product_price * $orders->quantity}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Customer Info </h5>
                        <div class="card-body table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span>Name</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->customer->full_name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Phone No </span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->customer->phone_no ?? 'N/A'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span> Address </span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->customer->address ?? 'N/A'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Payment Method</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->payment->method}}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <span>Status</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold"> {!! $order->display_status !!} </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Shipping Info </h5>
                        <div class="card-body table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span>Name</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->shipping->full_name ?? 'Self'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Phone No</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">{{$order->shipping->phone_number ?? 'Self'}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="text-center font-weight-bold mt-2">{{$order->shipping->address ?? 'Self'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
