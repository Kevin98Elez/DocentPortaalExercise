<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href={{route('welcome')}}>
        <img src="https://www.syntra.be/wp-content/uploads/2022/07/Synta-logo-klein.png" jsaction="VQAsE" class="r48jcc pT0Scc iPVvYb" alt="SYNTRA" jsname="kn3ccd" data-iml="208049.60000002384" aria-hidden="true" width="70px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href={{route('welcome')}}>Leerkrachten</a>
          </li>
          

            @foreach ($pages as $page)
              <li class="nav-item">
                <a class="nav-link" href={{Route('page', $page->title)}}>{{$page->title}}</a>
              </li>
            @endforeach

        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>