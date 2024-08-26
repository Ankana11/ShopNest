@extends('admin.layouts.app')

@section('index')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Inventry</h4>
                        <form class="forms-sample" action="{{ route('admin.update_data', $inventry->id) }}" method="post" name="inventoryForm" id="inventoryForm" enctype="multipart/form-data">
                            @csrf  
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input type="text" value="{{ $inventry->name }}" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <input type="text" value="{{ $inventry->description }}" class="form-control" id="exampleInputName2" name="description" placeholder="description">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input type="text" value="{{ $inventry->price }}" class="form-control" id="exampleInputName3" name="price" placeholder="price">
                                <p></p>
                            </div>
                          
                            <div class="form-group">
                                <label>Image upload</label>
                                {{-- <input type="file" name="img" class="file-upload-default"> --}}
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="image">  
                                    <img src="{{ asset('image/'. $inventry->image) }}" alt="">       
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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
    $('#inventoryForm').submit(function(event){
        event.preventDefault();  
        var element = $(this)[0];
        var formData = new FormData(element); 

        $.ajax({
            url: '{{ route("admin.update_data", $inventry->id) }}',  
            type: 'POST',  
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
            if(response.status == true){
                alert("Inventory Updated Successfully");
                window.location.href = "{{ route('admin.product-list') }}";
            } else {
             
            }
            },
    error: function(jqXHR, exception) {
        console.log('Something went wrong');
    }
});

    });
</script>
@endsection

