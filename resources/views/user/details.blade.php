@extends('partials.app')
@section('title')
    User Details
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-plus-square">
                    </i>
                </div>
                <div style="font-variant: small-caps"><b> User Details </b></div>
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
                        <h5 class="card-title"> User Info </h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"> User Activity </h5>
                        <div class="card-body table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <span>Total Order</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">32</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Pending Order</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">12</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Complete Order</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">15</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Cancel Order</span>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <span class="font-weight-bold">5</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
