@extends('product.layout')
@section('content')
<div class="card">
  <div class="card-header">Productus Page</div>
  <div class="card-body">
      
      <form action="{{ url('product') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        {{-- <label>Seller_id</label></br>
        <input type="text" name="seller_id" id="seller_id" class="form-control"></br> --}}
        <div class="form-group">
          <label>Seller_id</label>
          <select class="form-control select2" style="width: 100%;" name="seller_id" id="seller_id">
            <option disabled value>Pilih Seller</option>
            @foreach ($seller as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Category_id</label>
          <select class="form-control select2" style="width: 100%;" name="category_id" id="category_id">
            <option disabled value>Pilih Category</option>
            @foreach ($category as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        {{-- <label>Category_id</label></br>
        <input type="text" name="category_id" id="category_id" class="form-control"></br> --}}
        <label>Price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop