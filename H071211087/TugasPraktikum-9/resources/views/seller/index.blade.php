@extends('seller.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Seller Table</div>
                    <div class="card-body">
                        <a href="{{ url('/seller/create') }}" class="btn btn-success btn-sm" title="Add New Seller">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>No_Hp</th>
                                        <th>Status</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th>Actions</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($seller as $index => $item)
                                    <tr>
                                        <th>{{ $index + $seller->firstItem()}}</th>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('/seller/' . $item->id) }}" title="View seller"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/seller/' . $item->id . '/edit') }}" title="Edit seller"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/seller' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete seller" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $seller->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection