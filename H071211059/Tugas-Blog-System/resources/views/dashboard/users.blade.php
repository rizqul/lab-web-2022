@extends('layouts.dashboard.master')

@section('page-title')
    User List
@endsection

@section('module-title')
    <h1>User Lists</h1>
@endsection

@section('user-module')
    @if (auth()->user()->is_admin == 1)
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                <span>User</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/users"><i class="fas fa-list"></i>User List</a>
                </li>
                <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create User</a></li>
            </ul>
        </li>
    @endif
@endsection

@section('css-libraries')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection



@section('css-spesific')
    <style>
        tr td {
            width: 1%;
            white-space: nowrap;
        }

        tr {
            text-align: center
        }

        .note-btn {
            margin: 0 10px;
        }

        .note-icon-caret {
            display: none
        }
    </style>
@endsection

@section('page-content')
    {{-- Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="filterDiv" class="mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class='text-center'>Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Joined Date</th>
                                    <th class="text-center">Article Authored</th>
                                    <th class="text-center">is_admin?</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center" id="actionsBtn">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="row-{{ $user->id }}">
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td  class="align-middle">{{ $user->email }}</td>
                                        <td  class="align-middle">{{ $user->username }}</td>
                                        <td  class="align-middle">{{ $user->created_at }}</td>
                                        <td  class="align-middle">
                                            <a class="btn btn-primary" style="color: white"><i class="fas fa-eye"></i>
                                                View</a>
                                        </td>
                                        <td  class="align-middle">{{ $user->is_admin }}</td>
                                        <td  class="align-middle">{{ $user->status }}</td>
                                        <td  class="align-middle">
                                            <a href="#edit-form-card" style="color: white" class="edit-btn"
                                                id="{{ $user->id }}">
                                                <button class="btn btn-primary" value='{{ $user->id }}'><i
                                                        class="fas fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i>
                                                Delete</button> --}}
                                            <button class="btn btn-danger" data-confirm="Really?|Do you want to continue?"
                                                data-confirm-yes="test({{ $user->id }});">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Form --}}
    <div class="row" id="create-form-card" style="display: none">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                    {{-- form card --}}
                    <form id="submit-form" action="/users" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Photo</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control mb-3" name="img-file">
                                <input type="text" class="form-control" name="img-url"
                                    placeholder="Or insert url here.....">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Level</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" name="is_admin">
                                    <option value="0">Member</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" name="status">
                                    <option value="2">Active</option>
                                    <option value="1">Inactive</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biography</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="biography" id="create_bio"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary mx" type="submit">Submit</button>
                                <button class="btn btn-primary" id="clear-btn" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Form --}}
    <div class="row" id="edit-form-card" style="display: none">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update User</h4>
                </div>
                <div class="card-body">
                    {{-- form card --}}
                    <form id="update-form" action="users.update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <input type="hidden" name="id" id="id" value="">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" id="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" id="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" id="username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Photo</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control mb-3" name="img-file">
                                <input type="text" class="form-control" name="img-url"
                                    placeholder="Or insert url here.....">
                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Level</label>
                            <div class="col-sm-12 col-md-7" id="is_admin">
                                <select class="form-control" name="is_admin">
                                    <option value="0">Member</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7" id="status">
                                <select class="form-control" name="status">
                                    <option value="2">Active</option>
                                    <option value="1">Inactive</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biography</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" id="bio" name="biography"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary mx" type="submit">Update</button>
                                <button class="btn btn-primary" id="clear-btn" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Droddown Filter --}}
    <div class="dropdown-menu" id="filter-menu">
        {{-- Status Filter --}}
        <div class="dropdown-title pb-0">Status</div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="active" value="2">
            <a class="form-check-label" for="active">
                Active
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="inactive" value="1">
            <a class="form-check-label" for="inactive">
                Inactive
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-status" name="status" type="checkbox" id="block" value="0">
            <a class="form-check-label" for="block">
                Block
            </a>
        </div>

        <div class="dropdown-title pb-0">User Level</div>
        <div class="form-check ml-2">
            <input class="filter-isAdmin" type="checkbox" id="admin" value="1">
            <a class="form-check-label" for="admin">
                Admin
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-isAdmin" type="checkbox" id="member" value="0">
            <a class="form-check-label" for="member">
                Member
            </a>
        </div>

        {{-- Date Filter Element --}}
        <div class="dropdown-title pb-0">Joined Date</div>
        <div class="from-date ml-4 mr-3">
            <a for="from" class="">From</a>
            <input type="date" class=" mb-1 w-100" name="from" id="from" style="display: block">
        </div>
        <div class="to-date ml-4 mr-3 mb-1">
            <a for="to" class="">To</a>
            <input type="date" class=" mb-1 w-100" name="to" id="to" style="display: block">
        </div>
        <div class="w-100">
            <button class="btn btn-primary btn-sm mt-2 mr-3 float-right" id="clear-filter">Clear</button>
        </div>
    </div>
@endsection

@section('spesific-js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://raw.githubusercontent.com/phstc/jquery-dateFormat/master/dist/jquery-dateformat.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        var fromDate;
        var toDate;
        var table;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $("#table-1").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [4, 7]
            }, {
                "visible": false,
                "targets": [5, 6]
            }],
        })

        $('#from, #to').on('change', function() {
            table.draw();
        });

        $("#filterDiv").append(
            "<a href='#create-form-card' class='btn btn-success mr-3' id='create-btn' style='color: white;'><i class='fas fa-plus'></i>  Create User</a>"
        )
        $("#filterDiv").append(
            "<button class='btn btn-primary' id='filterBtn' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fas fa-filter'></i>  Filter</button>"
        )
        $("#filter-menu").prependTo($("#filterDiv"));

        // filter
        fromDate = $("#from");
        toDate = $("#to");

        // date-filter
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = fromDate.val();
                var max = toDate.val();
                var date = new Date(data[3]);
                year = date.getFullYear();
                month = date.getMonth() + 1;
                day = date.getDate();
                date = year + "-" + month + "-" + day
                if (
                    (min === "" && max === "") ||
                    (min === "" && date <= max) ||
                    (min <= date && max === "") ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
            }
        );

        // column-filter (status, user level)
        $('.filter-status').on('change', function(e) {
            var searchTerms = []
            $.each($('.filter-status'), function(i, elem) {
                if ($(elem).prop('checked')) {
                    searchTerms.push("^" + $(this).val() + "$")
                }
            })
            table.column(6).search(searchTerms.join('|'), true, false, true).draw();
            console.log($(this).val());
        });

        $('.filter-isAdmin').on('change', function(e) {
            var searchTerms = []
            $.each($('.filter-isAdmin'), function(i, elem) {
                if ($(elem).prop('checked')) {
                    searchTerms.push("^" + $(this).val() + "$")
                }
            })
            table.column(5).search(searchTerms.join('|'), true, false, true).draw();
            console.log($(this).val());
        });

        // Clear filter Button
        $(document).on('click', '#clear-filter', function(e) {
            $('input[type=checkbox]').prop('checked', false);
            $('input[type=date]').val('');
            table
                .search('')
                .columns().search('')
                .draw();
        })

        // Create Form Button
        $(document).on('click', '#create-btn', function() {
            $('#create-form-card').show();
            $('#edit-form-card').hide();
        })

        // Edit Form Button
        $(document).on('click', '.edit-btn', function() {
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#update-form').attr('action', '{{ route('users.update') }}');

            $.ajax({
                type: "get",
                url: "/users/" + id,
                success: function(response) {
                    // console.log($('.note-editable'));
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#username').val(response.username);
                    $('#status select').val(response.status).change();
                    $('#is_admin select').val(response.is_admin).change();
                    $("#bio").summernote("code", response.biography);
                    // console.log(response.biography);
                }
            });
            $('#edit-form-card').show();
            $('#create-form-card').hide();
        })

        // Clear form button
        $(document).on('click', '#clear-btn', function() {
            $('#submit-form')[0].reset();
            $('#update-form')[0].reset();
            $("#create_bio").summernote("code", "");
        })

        // Delete Ajax Call
        function test(id) {
            var row = table.row($('#row-' + id));
            var rowIndex = row.index() + 1;
            console.log(rowIndex);
            $.ajax({
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    _method: "DELETE"
                },
                url: 'users/delete/' + id,
                success: function(response) {
                    row.remove().draw();
                    $("#fire-modal-" + rowIndex).modal('hide');
                }
            })
        }
    </script>
@endsection
