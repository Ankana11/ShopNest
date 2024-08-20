@extends('admin.layouts.app')

@section('index')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Inventry</h4>
                        <form class="forms-sample" action="{{ route('admin.store-inventry') }}" method="post" name="inventoryForm" id="inventoryForm">
                            @csrf  
                            <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                <p></p>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <input type="text" class="form-control" id="exampleInputName2" name="description" placeholder="description">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Price</label>
                                <input type="text" class="form-control" id="exampleInputName3" name="price" placeholder="price">
                                <p></p>
                            </div>

                            
                           
                            <div class="form-group">
                                <label>Image upload</label>
                                {{-- <input type="file" name="img" class="file-upload-default"> --}}
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" placeholder="Upload Image">         
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
      $('#inventoryForm').submit(function(event){
            event.preventDefault();  
            var element = $(this);

            $.ajax({
                url: '{{ route("admin.store-inventry") }}',  
                type: 'POST',
                dataType: 'json',
                data: element.serialize(),  
                success: function(response){
                 
                  if(response['status'] == true){
                   alert("Inventry Stored Successfuly");
                    window.location.href="{{ route('admin.product-list') }}"
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    
                  }else{
                    var errors = response['errors'];
                  if(errors['name']){
                   $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
                  }else{
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                  }

                  if(errors['description']){
                   $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description']);
                  }else{
                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                  }
                  if(errors['price']){
                   $('#price').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['price']);
                  }else{
                    $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                  }
                  }
                    
                },
                error: function(jqXHR, exception) {
                    console.log('Something went wrong');
                   
                }
            });
        });
   </script>
@endsection
