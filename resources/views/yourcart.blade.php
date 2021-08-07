
<h2> your cart items </h2>

<div class="container">

        @foreach($productsdisplay as $item)
        <div class="card" style="width: 18rem;">
    <img class="products" src={{$item->gallery}} class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$item->name}}</h5>
    <p class="card-text">{{$item->description}}</p>
    <p class="card-price">{{$item->price}}</p>
        <form action="">
                <button class="btn btn-primary">Delete from cart</a>
     </form>
  </div>
</div>
@endforeach
<style>
.products
{
   height: 200px;
}
   </style>