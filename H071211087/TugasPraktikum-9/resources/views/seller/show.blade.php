@extends('seller.layout')
@section('content')


<div class="card">
  <div class="card-header">Seller Page</div>
  <div class="card-body">
  

        <div class="card-body">
        <h5 class="card-title">Name : {{ $seller->name }}</h5>
        <p class="card-text">Address : {{ $seller->address }}</p>
        <p class="card-text">Gender : {{ $seller->gender }}</p>
        <p class="card-text">No_hp : {{ $seller->no_hp }}</p>
        <p class="card-text">Status : {{ $seller->status }}</p>
  </div>
      
</hr>
  
  </div>
</div>