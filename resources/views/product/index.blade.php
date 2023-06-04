@extends('partials.app')
@section('title')
    Products
@endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-poll">
                </i>
            </div>
            <div style="font-variant: small-caps"> <b> Products </b> </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('product.create')}}" class="btn-shadow mr-3 btn btn-primary">
                <i class="fas fa-plus-circle"> </i>
                Add
            </a>
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
                            <th class="text-center">image</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">SKU</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                <td class="text-center text-muted">
                                    <img src="{{ $product->image  }}" alt="Product Image" height="50px">
                                </td>
                                <td class="text-center">
                                    {{ $product->categorie->name  }}
                                    <br/>
                                    <small class="badge badge-pill badge-primary">{{ $product->subcategorie->name  }}</small>
                                </td>
                                <td class="text-center">{{ $product->name }}</td>
                                <td class="text-center">{{ $product->slug }}</td>
                                <td class="text-center">{{ $product->SKU }}</td>
                                <td class="text-center">{{ $product->regular_price }}</td>
                                <td class="text-center">{!! $product->display_status !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{route('product.edit', $product->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('product.destroy', $product->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete-category" type="submit" data-confirm-delete="true">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @if($product->status == 0)
                                        <a class="btn btn-info btn-sm" href="" id="active" data-id="{{$product->id}}" data-status="{{$product->status}}">
                                            <i class="fas fa-check-double"></i>
                                            Active
                                        </a>
                                    @else
                                        <a class="btn btn-warning btn-sm" href="" id="deactive" data-id="{{$product->id}}" data-status="{{$product->status}}" >
                                            <i class="fas fa-times"></i>
                                            Deactive
                                        </a>
                                    @endif
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
            $('.delete-category').on('click', function (e) {
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
