@extends('partials.app')
@section('title')
    Add Product
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
                <div style="font-variant: small-caps"><b> Add Product </b></div>
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

    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> Product Info </h5>
                        <div class="from-group">
                            <label for="name"> Name : </label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Product Name" value="{{old('name')}}">
                        </div>
                        <div class="from-group">
                            <label for="name"> SKU : </label>
                            <input type="text" class="form-control" name="sku" placeholder="Exm- XYZ12345" value="{{old('sku')}}">
                        </div>
                        <div class="from-group">
                            <label for="email"> Short Description : </label>
                            <textarea name="short_description" id="" rows="5" class="form-control" placeholder="Short Description"></textarea>
                        </div>
                        <div class="from-group">
                            <label for="password"> Description : </label>
                            <textarea name="description" id="" rows="5" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="from-group m-2">
                            <label for="name"> Select Category : </label>
                            <select name="category_id" class="form-control select2">
                                <option value=""> --Select Category-- </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group m-2">
                            <label for="name"> Select Subcategory : </label>
                            <select name="subcategory_id" class="form-control select2">
                                <option value=""> --Select Category-- </option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group m-2">
                            <label for="regular_price"> Regular Price : </label>
                            <input type="text" class="form-control" placeholder="Regular Price" name="regular_price" value="{{old('regular_price')}}">
                        </div>
                        <div class="from-group m-2">
                            <label for="discount_price"> Discount Price : </label>
                            <input type="text" class="form-control" placeholder="Discount Price" name="discount_price" value="{{old('discount_price')}}">
                        </div>
                        <div class="from-group m-2">
                            <label for="profile_pic"> Product Image : </label>
                            <input class="dropify" type="file" name="image" multiple>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-info" type="submit"> <i class="fas fa-plus-circle"></i> Save </button>
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
