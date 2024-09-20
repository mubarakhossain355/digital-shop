@extends('admin.master')
@section('title','edit-sub-category')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.update',$sub_category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                              <select name="category_id" id="" class="form-control">
                                <option value="">----Select Category----</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$sub_category->category_id == $category->id?'selected':' '}}>{{$category->name}}</option>
                                @endforeach
                               
                                </select>
                                <span class="text-danger">{{$errors->has('category_id')?$errors->first('category_id'):' '}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="categoryName" value="{{$sub_category->name}}" name="name" placeholder="Enter your sub category name" type="text">
                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'): ' '}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description"  name="description" placeholder="Enter sub category Description" type="text">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>
                                <img src="{{asset($sub_category->image)}}" id="categoryImage" alt="" height="40" width="40">
                            </div>
                        </div>
                        <div class="row">
                            <label for="status" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio" value="1" {{$sub_category->status == 1?'checked':' '}} name="status"/><span>Published</span></label>
                                <label><input type="radio" value="0" {{$sub_category->status == 0?'checked':' '}} name="status"/><span>Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Update Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
