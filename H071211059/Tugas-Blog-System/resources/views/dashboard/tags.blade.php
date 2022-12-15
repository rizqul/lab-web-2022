@extends('layouts.dashboard.master')

@section('page-title')
    Tags List
@endsection

@section('module-title')
    <h1>Tags List</h1>
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

        a.disabled {
            pointer-events: none;
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
                        <table class="table table-striped" id="tags-table">
                            <thead>
                                <tr>
                                    <th class='text-center'>Name</th>
                                    <th class="text-center">Article Count</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr id="row-{{ $tag->id }}">
                                        <td class="align-middle">{{ $tag->name }}</td>
                                        <td class="align-middle">22x</td>
                                        {{-- <td>{{ $tags->email }}</td> --}}
                                        <td class="align-middle">{{ $tag->created_at }}</td>
                                        <td class="align-middle">{{ $tag->user->name}}</td>
                                        <td class="align-middle">{{ $tag->status}}</td>
                                        {{-- <td>{{ $tags->created_at }}</td> --}}
                                        <td class="align-middle">
                                            <a href="#edit-form-card"
                                                style="color: white; @if (auth()->user()->id != $tag->author_id && auth()->user()->is_admin != 1) pointer-events: none @endif"
                                                class="edit-btn" id="{{ $tag->id }}">
                                                <button class="btn btn-primary" value='{{ $tag->id }}'><i
                                                        class="fas fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            <button class="btn btn-danger" data-confirm="Really?|Do you want to continue?"
                                                data-confirm-yes="destroy({{ $tag->id }});"
                                                @if (auth()->user()->id != $tag->author_id && auth()->user()->is_admin != 1) disabled @endif>Delete</button>
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
                    <h4>Create Tag</h4>
                </div>
                <div class="card-body">
                    {{-- form card --}}
                    <form id="submit-form" action="/tags" method="post">
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
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="description" id="create-desc"></textarea>
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

    {{-- Edit Form --}}
    <div class="row" id="edit-form-card" style="display: none">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Tag</h4>
                </div>
                <div class="card-body">
                    {{-- form card --}}
                    <form id="update-form" action="/tags" method="post">
                        @csrf
                        <div class="form-group row mb-4">
                            <input type="hidden" name="id" id="id" value="">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" id="edit-name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="description" id="edit-desc"></textarea>
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
        <div class="dropdown-title pb-1">Status</div>
        <div class="form-check ml-2">
            <input class="filter-status" type="checkbox" id="published" value="1">
            <a class="form-check-label" for="published">
                Published
            </a>
        </div>
        <div class="form-check ml-2">
            <input class="filter-status" type="checkbox" id="archived" value="0">
            <a class="form-check-label" for="archived">
                Archived
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

        var table = $("#tags-table").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [5, 3]
            }, {
                "visible": false,
                "targets": [4]
            }],
        })

        $("#filterDiv").append(
            "<a href='#create-form-card' class='btn btn-success mr-3' id='create-btn' style='color: white;'><i class='fas fa-plus'></i>  Create Tag</a>"
        )
        $("#filterDiv").append(
            "<button class='btn btn-primary' id='filterBtn' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fas fa-filter'></i>  Filter</button>"
        )
        $("#filter-menu").prependTo($("#filterDiv"));

        $('#from, #to').on('change', function() {
            table.draw();
        });

        // filter
        fromDate = $("#from");
        toDate = $("#to");

        // date-filter
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = fromDate.val();
                var max = toDate.val();
                var date = new Date(data[2]);
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
            table.column(4).search(searchTerms.join('|'), true, false, true).draw();
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

        // Show create tag form
        $(document).on('click', '#create-btn', function() {
            $('#create-form-card').show();
            $('#edit-form-card').hide();
        })

        // Clear form button
        $(document).on('click', '#clear-btn', function() {
            $('#submit-form')[0].reset();
            $('#update-form')[0].reset();
            $("#create-desc").summernote("code", "");
            $("#edit-desc").summernote("code", "");
        })

        // Edit Form Button
        $(document).on('click', '.edit-btn', function() {
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#update-form').attr('action', '{{ route('tags.update') }}');

            $.ajax({
                type: "get",
                url: "/tags/" + id,
                success: function(response) {
                    console.log(response);
                    $('#id').val(response.id);
                    $('#edit-name').val(response.name);
                    $("#edit-desc").summernote("code", response.description);
                }
            });
            $('#edit-form-card').show();
            $('#create-form-card').hide();

            
        })

        function destroy(id) {
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
                    url: 'tags/delete/' + id,
                    success: function(response) {
                        row.remove().draw();
                        $("#fire-modal-" + rowIndex).modal('hide');
                    }
                })
            }
    </script>
@endsection
