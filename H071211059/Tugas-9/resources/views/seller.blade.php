@extends('layout.master')

@section('form_input')
    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh"/>
    <div class="mb-3 form-floating">
        <input type="text" name="name" class="form-control form-control-sm" id="name"
               placeholder="duh"/>
        <label for="name">Name</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="address" class="form-control form-control-sm" id="address"
               placeholder="duh"/>
        <label for="address">Address</label>
    </div>
    <div class="mb-3 form-floating">
        <select class="form-select" aria-label="Default select example" name="gender">
            <option selected>Open this select menu</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="plastik indomaret">Plastik Indomaret</option>
        </select>
        <label for="gender">Gender</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="no_hp" class="form-control form-control-sm" id="no_hp"
               placeholder="duh"/>
        <label for="no_hp">Phone Number</label>
    </div>
    <div class="mb-3 form-floating">
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Open this select menu</option>
            <option value="Active">Active</option>
            <option value="Suspended">Suspended</option>
        </select>
        <label for="status">Status</label>
    </div>
    </div>
@stop

@section('thead')
    <tr>
        <th class="table-primary">Name</th>
        <th class="table-primary">Address</th>
        <th class="table-primary">Gender</th>
        <th class="table-primary">Phone Number</th>
        <th class="table-primary">Status</th>
        <th class="table-primary">Action</th>
    </tr>
@stop

@section('tbody')
    @foreach($sellers as $seller)
    <tr>
        <td>{{$seller->name}}</td>
        <td>{{$seller->address}}</td>
        <td>{{$seller->gender}}</td>
        <td>{{$seller->no_hp}}</td>
        <td>{{$seller->status}}</td>
        <td>
            <button class="btn btn-success btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
        </td>
    </tr>
    @endforeach
@stop

@section('paginate_link', $sellers->links())