@extends('backend.partials.app')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-info-circle">
                </i>
            </div>            
            <div style="font-variant: small-caps"> <b> Deposit Details </b> </div>
        </div>
        <div class="page-title-actions">
            @if ( Auth::user()->havePermission('content.create') )
                <a href="{{ route('deposit.create') }}" class="btn-shadow mr-3 btn btn-primary">
                    <i class="fas fa-plus-circle"> </i>
                    Deposit
                </a>
            @endif            
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
                            <th class="text-center">Date</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Amount</th>
                            
                            @if (Auth::user()->havePermission('content.create'))
                            <th class="text-center">Action</th>   
                            @endif                                                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deposit as $key => $value)
                            @if ($value->deposit > 0)
                                <tr>
                                    <td class="text-center text-muted">{{$value->deposit_date}}</td>
                                    <td class="text-center">{{ $value->user_name }}</td>
                                    <td class="text-center">                                        
                                        {{ $value->deposit }}                                        
                                    </td>

                                    @if (Auth::user()->havePermission('content.create'))
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm mb-1" href="{{ route('deposit.edit',$value->id) }}">
                                            <i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
        
                                        <a class="btn btn-danger btn-sm mb-1 text-white" onclick="deleteData({{ $value->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Delete</span>
                                        </a>
                                        <form id="deleteForm-{{ $value->id }}"
                                            action="{{ route('deposit.destroy',$value->id) }}" method="POST"
                                            style="display: none;">
                                          @csrf()
                                          @method('DELETE')
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endif
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