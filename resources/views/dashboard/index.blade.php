@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Administração cursos</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle"></span>
              </a>
          </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Curso <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Aula
            </a>
          </li>

        </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Administração Alunos</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle"></span>
              </a>
          </h6>
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link active" href="#">
                      <span data-feather="home"></span>
                      Alunos <span class="sr-only">(current)</span>
                  </a>
              </li>
          </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
    </main>
  </div>
</div>
@endsection
