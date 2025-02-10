@extends('admin.master')
@section('title','add-color')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Color Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('color.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="colorName" class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="colorName" name="name" placeholder="Enter your color name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Color Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" name="description" placeholder="Enter color description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Color Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>
                                <img src="" id="categoryImage" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="status" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio" value="1" checked name="status"/><span>Published</span></label>
                                <label><input type="radio" value="0"  name="status"/><span>Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Create New Color</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
