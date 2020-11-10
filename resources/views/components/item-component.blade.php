{{-- <div class="col-lg-4 col-md-6 my-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$item->name}}</a>
      </h4>
      <h5>{{$item->price}} MMK</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
    </div>
    <div class="card-footer">
      <a href="{{route('itemdetail',$item->id)}}" class="btn btn-info">Detail</a>
    </div>
  </div>
</div> --}}

<div class="owl-item">
  <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="padding-left: 0px;padding-right:0px;">
    <div class="pad15">
      <a href="{{route('itemdetail',$item->id)}}" class="text-decoration-none text-dark">
        <img src="{{asset($item->photo)}}" class="img-fluid" style="width: 160px;">
        <p class="text-truncate" style="width: 160px;">{{$item->name}}</p>
        <p class="item-price">
           <span class="d-block"> {{$item->price}} MMK</span> 
        </p>
      </a>
      <a href="{{route('itemdetail',$item->id)}}" class="btn btn-outline-info btn-block">Detail</a>     
    </div>
  </div>
</div>