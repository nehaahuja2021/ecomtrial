

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fresh Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders</a>
        </li>
        
        <li class="nav-item" >
          <a class="nav-link active" href="/product">Cart(0)</a>
        </li>
        
@if(Session::has('user')) 
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/logout">Logout</a></li>
          
        </ul>
      </li>
@else
<a class="nav-link active" href="/login" >Login</a>
@endif



      </ul>
      <div>
      <form action="/search"  class="d-flex">
      
        <input class="form-control me-2" type="search" placeholder="Search" name="searchform" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
</div>

      </div>
  </div>
</nav>