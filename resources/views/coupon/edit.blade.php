@extends('partials.app')
@section('title')
    Update Coupon
@endsection
@push('css')
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
                <div style="font-variant: small-caps"> <b> Update Coupon </b> </div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('coupon.index')}}" class="btn-shadow mr-3 btn btn-danger">
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

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <form class="needs-validation" action="{{route('coupon.update', $coupon->id)}}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="offset-md-3 col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Coupon Name</span>
                                <input type="text" class="form-control" value="{{$coupon->name}}" name="coupon_name">
                            </div>
                        </div>
                        <div class="offset-md-3 col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Discount</span>
                                <input type="text" class="form-control" value="{{$coupon->discount}}" name="discount">
                            </div>
                            <div class="input-group m-2 d-flex justify-content-center">
                                <button class="btn btn-info" type="submit"> <i class="fas fa-plus-circle"></i> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
