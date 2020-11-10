@extends('frontendtemplate')

@section('content')
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <x-slider-component></x-slider-component>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            @foreach($discounts_items as $row)
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{asset($row->photo)}}" alt="First slide"  style="width:900px; height:350px">
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

          
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
  </div>
  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col">
        <div class="bbb_viewed_title_container">
          <h3 class="bbb_viewed_title"> Itmes  </h3>
          <div class="bbb_viewed_nav_container">
            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fa fa-chevron-left"></i></div>
            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fa fa-chevron-right"></i></div>
          </div>
        </div>
        <div class="bbb_viewed_slider_container">
          <div class="owl-carousel owl-theme bbb_viewed_slider">
            @foreach($items as $item)

            <x-item-component :item="$item"></x-item-component>

            @endforeach                      
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <div class="bbb_viewed_title_container">
          <h3 class="bbb_viewed_title"> Brands  </h3>
          <div class="bbb_viewed_nav_container">
            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fa fa-chevron-left"></i></div>
            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fa fa-chevron-right"></i></div>
          </div>
        </div>
        <div class="bbb_viewed_slider_container">
          <div class="owl-carousel owl-theme bbb_viewed_slider">
            @foreach($brands as $brand)
              <div class="owl-item">
                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="padding-left: 0px;padding-right:0px;">
                  <div class="pad15">
                    <a href="{{route('itemsbybrand',$brand->id)}}" class="text-decoration-none text-dark">
                      <img src="{{asset($brand->photo)}}" class="img-fluid" style="width: 160px;">
                      <p class="text-truncate" style="width: 160px;">{{$brand->name}}</p>
                    </a>      
                  </div>
                </div>
              </div>
            @endforeach                      
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('my_asset/js/cart.js')}}"></script>
@endsection