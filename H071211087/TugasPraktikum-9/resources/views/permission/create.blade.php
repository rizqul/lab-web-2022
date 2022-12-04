@extends('permission.layout')
@section('content')
<div class="card">
  <div class="card-header">permissionus Page</div>
  <div class="card-body">
      
      <form action="{{ url('permission') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop