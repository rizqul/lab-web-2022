@extends('../layout/' . $layout)

@section('subhead')
    <title>Modal - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="mx-auto">
    <!-- untuk memasukkan data -->
    <div class="card">
        <div class="card-header text-white bg-secondary">
            List Makanan
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Makanan</th>
                        <th scope="col">Description</th>
                        <th scope="col">Favorite</th>
                        <th scope="col">order</th>
                        <th scope="col">price</th>
                        <th scope="col">create date</th>
                    </tr>
                </thead>
                <tbody>
                <tr>

                </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>


@endsection
