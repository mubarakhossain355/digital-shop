@extends('admin.master')
@section('title','manage-unit')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Unit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Unit</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Sl No.</th>
                                    <th class="border-bottom-0">Unit Name</th>
                                    <th class="border-bottom-0">Image</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td><img src="{{asset($unit->image)}}" alt="" height="40" width="40"></td>
                                    <td>{{$unit->status == 1?'Published':'Unpublished'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('unit.destroy',$unit->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ms-1" onclick="return confirm('Are you sure to delete this')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection