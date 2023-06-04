@extends('partials.app')
@section('title')
    Update Product
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <style>
        .bd-callout {
            padding: .5rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 1px solid #e9ecef;
            border-left-width: 0.25rem;
            border-radius: 0.25rem;
        }

        .bd-callout-warning {
            border-left-color: #f0ad4e;;
        }
    </style>
@endpush
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-plus-square">
                    </i>
                </div>
                <div style="font-variant: small-caps"><b> Update Product </b></div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('product.index')}}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fas fa-arrow-circle-left"> </i>
                    Back to list
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bd-callout bd-callout-warning">
            <ul class="list-unstyled mb-0 error-message">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Product Info </h5>
                        <div class="from-group">
                            <label for="name"> Name : </label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Product Name" value="{{$product->name}}">
                        </div>
                        <div class="from-group">
                            <label for="name"> SKU : </label>
                            <input type="text" class="form-control" name="sku" placeholder="Exm- XYZ12345" value="{{$product->SKU}}">
                        </div>
                        <div class="from-group">
                            <label for="email"> Short Description : </label>
                            <textarea name="short_description" id="" rows="5" class="form-control" placeholder="Short Description">{{$product->short_description}}</textarea>
                        </div>
                        <div class="from-group">
                            <label for="password"> Description : </label>
                            <textarea name="description" id="" rows="5" class="form-control" placeholder="Description">{{$product->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="from-group my-2">
                            <label for="name"> Select Category : </label>
                            <select name="category_id" class="form-control select2">
                                <option value=""> --Select Category-- </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group my-2">
                            <label for="name"> Select Subcategory : </label>
                            <select name="subcategory_id" class="form-control select2">
                                <option value=""> --Select Category-- </option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" {{$product->subcategory_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group my-2">
                            <label for="regular_price"> Regular Price : </label>
                            <input type="text" class="form-control" placeholder="Regular Price" name="regular_price" value="{{$product->regular_price}}">
                        </div>
                        <div class="from-group my-2">
                            <label for="discount_price"> Discount Price : </label>
                            <input type="text" class="form-control" placeholder="Discount Price" name="discount_price" value="{{$product->discount_price}}">
                        </div>
                        <div class="from-group my-2">
                            <label for="profile_pic"> Product Image : </label>
                            <input class="dropify" type="file" name="image" data-default-file="{{asset($product->image)}}">
                        </div>

                        <div class="d-flex justify-content-end my-2">
                            <button class="btn btn-info" type="submit"> <i class="fas fa-plus-circle"></i> Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endpush
