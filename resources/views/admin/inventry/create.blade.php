@extends('admin.layouts.app')

@section('index')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Inventry</h4>
                        
                        <form class="forms-sample" action="{{ route('admin.store') }}" method="post" name="categoryForm" id="categoryForm">
                            @csrf  
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Sale Price</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">SKU</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                            </div>

                            
                            <div class="form-group">
                                <label for="exampleSelectGender">Status</label>
                                <select class="form-control" id="exampleSelectGender" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customJs')
   
@endsection
