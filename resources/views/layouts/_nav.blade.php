<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto nav-section">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right nedv">
      <div class="d-flex justify-content-center align-content-center nedv">
         <span class="users">{{auth()->user()->name}}</span>
          <form action="{{route('logout')}}"  method="POST" class="logout">
          @csrf
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>

          </form>
        </div>
        </ul>
  </nav>
