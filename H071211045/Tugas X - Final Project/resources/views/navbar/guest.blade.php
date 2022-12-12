<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong fixed-top">
    <div class="container-fluid">
        <img src="{{ asset('logo.png') }}" alt="logo" width="50" height="50" class="d-inline-block align-text-top ms-5 me-2" />
        <a class="navbar-brand my-2 d-flex justify-content-center" href="#">
            <span class="text-third fw-bold">HYPER</span>
            <span class="text-third fw-light">GRINDING</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-contents"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ps-3" id="nav-contents">
            <span class="me-4 separator">|</span>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-2" href="#">ARTICLES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-2" href="#">MEMBERS</a>
                </li>
            </ul>

            <ul class="navbar-nav me-5">
                <li>
                    <a class="nav-link me-2" href="#">A NEWBIE?</a>
                </li>
                <li>
                    <button class="bg-transparent text-third px-3 py-2">SIGN IN</button>
                </li>
            </ul>
        </div>
    </div>
</nav>