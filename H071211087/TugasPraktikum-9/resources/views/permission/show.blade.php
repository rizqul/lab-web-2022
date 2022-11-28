@extends('permission.layout')
@section('content')


<div class="card">
  <div class="card-header">Permissionus Page</div>
  <div class="card-body">
  

        <div class="card-body">
        <h5 class="card-title">Name : {{ $permission->name }}</h5>
        <p class="card-text">description : {{ $permission->description }}</p>
        <p class="card-text">status : {{ $permission->status }}</p>
  </div>
      
</hr>
  
  </div>
</div>