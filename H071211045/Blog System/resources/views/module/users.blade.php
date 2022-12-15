@extends('module')

@section('content')
    <div class="display-5 pt-4">Users</div>

    @if (session('status'))
        <style>
            #message {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
            }

            #inner-message {
                margin: 0 auto;
            }

            #message span {
                letter-spacing: 1.2px;
            }
        </style>
        <div id="message">
            <div class="m-2 float-end">
                <div class="alert alert-dark alert-dismissible fade show rounded-0" role="alert">
                    <strong>Hola Amigos!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
        </div>
    @endif

    <div class="mt-2">
        <table class="table" id="table_user">
            <div class="row px-3 collapse w-75 mb-5" id="filter-menu">

                <div class="d-flex align-items-center">
                    <div class="display-7 fw-bold ">Filters</div>
                    
                </div>
                
                <hr class="mt-2 ms-2">
                    {{-- Date --}}
                    <div class="col d-flex flex-column">
                        <span class="fw-bold mb-3">Date</span>
                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="from">From</span>
                            <input class="col filter-status" name="status" type="date" id="from" value="from">
                        </div>

                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="to">To</span>
                            <input class="col filter-status" name="status" type="date" id="to" value="to">
                        </div>
                    </div>

                    {{-- Permission Level --}}
                    <div class="col ms-3 d-flex flex-column">
                        <span class="mb-2 fw-bold">Permission level</span>
                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="active">
                                Admin
                            </span>
                            <input class="col filter-permission" name="permission" type="checkbox" id="admin" value="admin">
                        </div>
                        
                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="inactive">
                                User
                            </span>
                            <input class="col filter-permission" name="permission" type="checkbox" id="user" value="user">
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="col ms-3 d-flex flex-column">
                        <span class="mb-2 fw-bold">Status</span>
                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="active">
                                Active
                            </span>
                            <input class="col filter-status" name="status" type="checkbox" id="active" value="active">
                        </div>
                        
                        <div class="row mb-2 d-flex align-items-center">
                            <span class="col form-check-label" for="inactive">
                                Inactive
                            </span>
                            <input class="col filter-status" name="status" type="checkbox" id="inactive" value="inactive">
                        </div>

                        <div class="row mb-2 -flex align-items-center">
                            <span class="col form-check-label" for="blocked">
                                Blocked
                            </span>
                            <input class="col filter-status" name="status" type="checkbox" id="blocked" value="blocked">
                        </div>

                        <div class="row">
                            <button class="btn bg-third rounded-0 w-50 mt-2 ms-2" id="clear-filter">Clear Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row px-3 mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Articles Authored</th>
                        <th scope="col">Status</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-capitalize">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->article_count }}</td>
                            <td class="text-capitalize">{{ $user->status }}</td>
                            <td class="text-capitalize">{{ $user->level }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="actions">
                                <a href="{{ url('panel/users/edit/' . $user->id) }}"
                                    class="btn bg-secondary text-third rounded-0">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button href="#" class="btn bg-danger text-third rounded-0 delete"
                                    data-bs-toggle="modal" data-bs-target="#confirm-delete-modal"
                                    data-id="{{ $user->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <a href="{{ url('member/' . $user->username) }}"
                                    class="btn bg-fourth text-primary rounded-0">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Users Found</td>
                        </tr>
                    @endforelse

                </tbody>

            </div>
        </table>
    </div>

    <div class="modal fade " id="confirm-delete-modal" tabindex="-1" aria-labelledby="confirm-delete-modal-label"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirm-delete-modal-label">Are you sure Bro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The deleted user will be permanently removed from the system.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn bg-danger text-fourth rounded-0"
                        data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id" id="id">
                    <a href="{{ url('/panel/users/delete/') }}" type="submit"
                        class="btn bg-primary text-fourth rounded-0" id="confirm-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const filterMenu =
            "<div class='form-outline d-flex'>" +
            "<button class='btn bg-primary text-third rounded-0 px-5 me-3 dropdown-toggle' data-bs-toggle='collapse'data-bs-target='#filter-menu' aria-expanded='false' aria-controls='filter-menu'>Filter By </button>" +
            "<a href='{{ route('page.users.new') }}'class='bg-primary text-third px-4 d-flex justify-content-center align-items-center'><span class='me-2'>New</span><span class='me-2'>User</span><i class='bi bi-plus-circle'></i></a>" +
            "</div>";

        $(document).ready(function() {

            $(".delete").click(function() {
                var id = $(this).data("id");
                $('#confirm-delete').attr('href', '/panel/users/delete/' + id);
            });

            var table = $("#table_user").DataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [0, 8]
                }],
                dom: '<"#filterDiv">frtip',
            })

            $('#from, #to').on('change', function() {
                table.draw();
            });

            $("#filterDiv").append(
                filterMenu
            );

            $("#filter-menu").prependTo($("#filterDiv"));

            fromDate = $("#from");
            toDate = $("#to");

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = fromDate.val();
                    var max = toDate.val();
                    var date = new Date(data[7]); // Kolom tanggal
                    console.log(date)
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

            $('.filter-status').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-status'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })

                table.column(5).search(searchTerms.join('|'), true, false, true).draw(); // Column Data status
                console.log($(this).val());
            });

            $('.filter-permission').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-permission'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                table.column(6).search(searchTerms.join('|'), true, false, true).draw(); // Column Data permission
                console.log($(this).val());
            });
            
            $(document).on('click', '#clear-filter', function(e) { // Clear Filter inputs
                $('input[type=checkbox]').prop('checked', false);
                $('input[type=date]').val('');
                table
                    .search('')
                    .columns().search('')
                    .draw();
            });
        });

        
    </script>
@endsection
