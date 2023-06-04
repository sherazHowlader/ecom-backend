@extends('partials.app')
@section('title')
    Categories
@endsection
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-poll">
                </i>
            </div>
            <div style="font-variant: small-caps"> <b> Categories </b> </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('category.create')}}" class="btn-shadow mr-3 btn btn-primary">
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $category->name }}</td>
                                <td class="text-center">{{ $category->slug }}</td>
                                <td class="text-center">{!! $category->display_status !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{route('category.edit', $category->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete-category" type="submit" data-confirm-delete="true">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @if($category->status == 0)
                                        <a class="btn btn-info btn-sm" href="" id="active" data-id="{{$category->id}}" data-status="{{$category->status}}">
                                            <i class="fas fa-check-double"></i>
                                            Active
                                        </a>
                                    @else
                                        <a class="btn btn-warning btn-sm" href="" id="deactive" data-id="{{$category->id}}" data-status="{{$category->status}}" >
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
                var category_id = $(this).attr('data-id');

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {status: status, category: category_id},
                    url: "{{route('category.status.toggle')}}",

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
