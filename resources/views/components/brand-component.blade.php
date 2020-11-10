<div class="accordion mt-4" id="accordionExample">
  @foreach($brands as $brand)
  <ul class="list-group">
    <li class="list-group-item">
      <a href="{{route('itemsbybrand',$brand->id)}}" class="text-decoration-none secondarycolor"> {{$brand->name}} </a>
    </li>
  </ul>
  @endforeach
</div>