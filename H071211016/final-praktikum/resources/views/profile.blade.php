@extends('layout.admin');
@section('content')
<div class="content-wrapper" style="min-height: 100vh;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @foreach($data as $item)
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('fotoArticle/'. $item->foto) }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$item -> name}}</h3>
                <p class="text-muted text-center">{{ $item -> created_at }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Article</b> <b class="float-right">{{ $item->articles_count }}</b>
                  </li>
                  
                  
                </ul>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Biography</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                  
                  @php
                  $bio = $item -> biography;
                  if($bio == NULL){
                    $bio = "NOT FILL YET";
                  } 
                  @endphp

                  Biography: {!!$bio!!}
                    
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="/editProfile/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ $item -> name }}" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail"  class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{$item -> email}}" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="userName" value="{{$item -> username}}" id="inputName2" placeholder="User Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Biography</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="biography" id="mysummernote" value="{{ $item->biography }}" >{{ $item->biography }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="foto" type="file" id="formFile">
                      </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Edit</button>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete Profile
                          </button>
                        </div>
                      </div>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are You Sure You Want To Delete This Profile? All Articles, Category, Sub Category, Tag From This Profile Will Be Permanently Deleted 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a type="button" href="/deleteProfile/{{$item->id}}" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection