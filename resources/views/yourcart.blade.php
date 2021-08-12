
<h2> your cart items </h2>
<a href="/product"> Go back to products </a>
<div class="container">

        @foreach($productsdisplay as $item)
        <div class="card" style="width: 18rem;">
    <img class="products" src={{$item->gallery}} class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$item->name}}</h5>
    <p class="card-text">{{$item->description}}</p>
    <p class="card-price">{{$item->price}}</p>
        
<a class href="/deletefromcart/{{$item->cart_id}}">Delete from cart </a>

<br>
<a class href="/ordernow">Order Now </a>
      
      </div>
</div>
@endforeach
<style>
.products
{
   height: 200px;
}
   </style>