@extends('master')

@section('title')
  Testing
@endsection

@section('content')

<!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset("frontend_assets/img/about-bg.jpg")}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Testing</h1>
            <span class="subheading">This is Testing Page.</span>
          </div>
        </div>
      </div>
    </div>
  </header>


 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h2>Testing Page</h2>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    // alert('Hello Testing Page');
  </script>
@endsection