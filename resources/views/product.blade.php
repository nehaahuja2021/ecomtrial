
@extends('master')
@section('content')


<h2> Welcome to Products Page </h2>
<div class="container">

        @foreach($products as $item)
        <div class="card" style="width: 18rem;">
  <img class="products" src={{$item->gallery}} class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$item->name}}</h5>
    <p class="card-text">{{$item->description}}</p>
    <p class="card-price">{{$item->price}}</p>
    <a href="#" class="btn btn-primary">Add to Cart</a>
  </div>
</div>

@endforeach

</div>

@endsection
