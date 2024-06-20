
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">Job Portal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('userLogin')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('findJob')}}">Find Jobs</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-primary me-2" href="{{url('userLogout')}}" type="submit">Logout</a>
                    <a class="btn btn-primary" href="{{url('userPostJob')}}" type="submit">Post a Job</a>
                </div>
            </div>
        </nav>
    </header>


