@extends('admin.layouts.app')

@section('index')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Category</h4>
                        
                        <form class="forms-sample" action="{{ route('admin.store') }}" method="post" name="categoryForm" id="categoryForm">
                            @csrf  
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword4">Slug</label>
                                <input type="text" class="form-control" id="exampleInputPassword4" name="slug" placeholder="Slug">
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
    <script>
        $('#categoryForm').submit(function(event){
            event.preventDefault();  
            var element = $(this);

            $.ajax({
                url: '{{ route("admin.store") }}',  
                type: 'POST',
                dataType: 'json',
                data: element.serialize(),  
                success: function(response){
                    console.log('Data saved successfully');
                    
                },
                error: function(jqXHR, exception) {
                    console.log('Something went wrong');
                   
                }
            });
        });
    </script>
@endsection
