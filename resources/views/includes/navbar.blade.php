<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.index')}}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('client.index')}}">Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('project.index')}}">Proyek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('invoice.index')}}">Invoice</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Order
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{route('invoice.index')}}">Invoice</a></li>
                        <li><a class="nav-link" href="{{route('order.index')}}">Order</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Serivce
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('service-offer.index')}}">Penawaran</a></li>
                        <li><a class="dropdown-item" href="#">Permintaan </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pekerjaan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('job.index')}}">Data Pekerjaan</a></li>
                        <li><a class="dropdown-item" href="{{route('jobtype.index')}}">Tipe </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
