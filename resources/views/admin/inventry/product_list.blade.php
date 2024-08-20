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
                                    <input type="text" class="form-control" value="{{ Request::get('keyword') }}" name="keyword" placeholder="Search categories...">
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
                                                    <i class="mdi mdi-delete text-danger"></i>
                                                    <i class="mdi mdi-table-edit text-success"></i>
                                                </td>
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
<!-- Add your custom JavaScript here if needed -->
@endsection
