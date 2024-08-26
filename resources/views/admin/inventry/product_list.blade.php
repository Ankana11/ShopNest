@extends('admin.layouts.app')

@section('index')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
              @include('admin.message')
                    <div class="card-body">
                        <h4 class="card-title">Inventry Status</h4>
                        <div class="mb-4">
                            <form action="" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ Request::get('keyword') }}" name="keyword" placeholder="Search Products...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <button onclick="window.location.href='{{ route('admin.product-list') }}'" class="btn btn-danger ml-2" type="button">Reset</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($inventries->isNotEmpty())
                                        @foreach ($inventries as $inventry)
                                            <tr>
                                                <td>{{ $inventry->id }}</td>
                                                <td><img src="{{ asset($inventry->image) }}" alt=""></td>
                                                <td>{{ $inventry->name }}</td>
                                                <td>{{ $inventry->description }}</td>
                                                {{-- <td>
                                                    @if($inventry->status == 'active')
                                                        <i class="mdi mdi-check-circle text-success"></i>
                                                    @else
                                                        <i class="mdi mdi-close-octagon text-danger"></i>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('admin.update', $inventry->id) }}"><button class="btn btn-success" type="submit">Edit</button></a>

                                                    <a href="javascript:void(0);" onclick="deleteInventory({{ $inventry->id }})">
                                                        <button class="btn btn-danger" type="button">Delete</button>
                                                    </a>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No categories found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $inventries->links() }}
                        </div>
                        <!-- End Pagination -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customJs')
<script>
    function deleteInventory(id) {
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: '{{ route("admin.delete", "") }}/' + id,  // Correctly concatenate the URL
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status == true) {
                    alert(response.message);
                    window.location.reload();  // Reload the page or redirect as needed
                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, exception) {
                console.log('Something went wrong');
            }
        });
    }
}

</script>
@endsection
