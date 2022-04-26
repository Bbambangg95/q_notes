<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
	<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<div class="dropdown text-end px-3 py-2">
		@auth
		<a href="#" class="d-block link-dark text-decoration-none text-white dropdown-toggle" id="dropdownUser1"
			data-bs-toggle="dropdown" aria-expanded="false">
			{{auth()->user()->name}}
			<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
		</a>
		<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
			<li><a class="dropdown-item" href="/profile">Profile</a></li>
			<li><a class="dropdown-item" href="#">Settings</a></li>
			<li>
				<hr class="dropdown-divider">
			</li>
			<li>
				<form action="/logout" method="post">
					@csrf
				<button type="submit" class="dropdown-item" href="#">Sign out</button></li>
			</form>
		</ul>

@else
<a href="/login" class="text-small">Login</a>
@endauth
</div>
  </header>

  <div class="container-fluid">
	<div class="row">
	  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
		<div class="position-sticky pt-3">
		  <ul class="nav flex-column">
			<li class="nav-item">
			  <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}" href="/santri">
				<span data-feather="home"></span>
				Dashboard
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link {{Request::is('santri*') ? 'active' : ''}}" href="/santri">
				<span data-feather="list"></span>
				Daftar Anggota
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link {{Request::is('absensi*') ? 'active' : ''}}" href="/absensi">
				<span data-feather="file-text"></span>
				Absensi Kehadiran
			  </a>
			</li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('hafalan*') ? 'active' : ''}}" href="/hafalan">
                  <span data-feather="file-text"></span>
                  Update Hafalan
                </a>
              </li>
		  </ul>
		</div>
	  </nav>
	</div>
  </div>
