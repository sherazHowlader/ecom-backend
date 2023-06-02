@extends('partials.app')

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
                <i class="fas fa-pen-square">
                </i>
            </div>
            <div style="font-variant: small-caps"> <b> Category Update </b> </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('category.index')}}" class="btn-shadow mr-3 btn btn-danger">
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
                <form class="needs-validation" action="{{route('category.update',$category->id)}}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="offset-md-3 col-md-6">
                        <div class="input-group">
                            <label class="form-label m-2"> Name : </label>
                            <input type="text" class="form-control" name="category_name" value="{{$category->name}}">
                            <button class="btn btn-info" type="submit"> <i class="fas fa-plus-circle"></i> Update </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection
