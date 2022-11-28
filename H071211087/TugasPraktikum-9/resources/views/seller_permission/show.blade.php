@extends('seller_permission.layout')
@section('content')


<div class="card">
  <div class="card-header">Seller_permissionus Page</div>
  <div class="card-body">
  

        <div class="card-body">
        <p class="card-text">Seller_id : {{ $product->seller_id }}</p>
        <p class="card-text">Permission_id : {{ $product->permission_id }}</p>
  </div>
      
</hr>
  
  </div>
</div>