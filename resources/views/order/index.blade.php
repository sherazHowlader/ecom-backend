@extends('partials.app')
@section('title')
    Orders
@endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-poll">
                </i>
            </div>
            <div style="font-variant: small-caps"> <b> Orders </b> </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">S/L</th>
                            <th class="text-center">Invoice</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Payment Type</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $order->invoice_id }}</td>
                                <td class="text-center">{{ $order->customer_id }}</td>
                                <td class="text-center">{{ $order->payment_type }}</td>
                                <td class="text-center">{{ $order->total }}</td>
                                <td class="text-center">{{ $order->subtotal }}</td>
                                <td class="text-center">{{ $order->discount }}</td>
                                <td class="text-center">{!! $order->display_status !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{route('order.show', $order->id)}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn btn-primary btn-sm">
                                        More
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item">Menus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function () {
            $('.delete-order').on('click', function (e) {
                e.preventDefault();
                swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to delete",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $(this).closest('form').submit();
                    }
                })
            });

            $('#active, #deactive').on('click', function (e){
                e.preventDefault();
                var status = $(this).attr('data-status');
                var product_id = $(this).attr('data-id');

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {status: status, product: product_id},
                    url: "{{route('product.status.toggle')}}",

                    beforeSend() {
                        swal.fire({
                            title: 'Processing your request...',
                        });
                        swal.showLoading();
                    },
                    success: function (response){
                        window.location.reload();
                    }
                })
            })
        })

    </script>
@endpush
