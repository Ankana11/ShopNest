@extends('admin.layouts.app')

@section('index')

    
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Categoris</h4>
                
                  <form class="forms-sample" action="" method="POST" name="categoryForm" id="categoryForm">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword4">Slug</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Slug">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                      <select class="form-control" id="exampleSelectGender">
                        <option>Active</option>
                        <option>InActive</option>
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
           

@endsection