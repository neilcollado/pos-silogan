@extends('layouts.app')
@section('content')

<link href="css/style.css" rel="stylesheet" />

<section class="about_section layout_padding"  style="margin-top: -20px; background: linear-gradient(to right, green, yellow)" >
    <div class="container">
      <div class="row">
        <div class="col-md-6" >
          <div class="img-box" style="margin-bottom: -50px">
            <img src="uploads/products/logo.png" alt=""> 
            <!-- bg-color #222831 -->
          </div>
        </div>
        <div class="col-md-5">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Silogan ni Gian
              </h2>
            </div>
            <div class="card">
                <div class="card-header" style="color: black">Welcome {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @can('is-admin')
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sales</th>
                            <th scope="col">Today</th>
                            <th scope="col">Month</th>
                            <th scope="col">Year</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td>₱ {{ $salesT }}</td>
                            <td>₱ {{ $salesM }}</td>
                            <td>₱ {{ $salesY }}</td>
                          </tr>    
                        </tbody>
                      </table>
                    @endcan
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

@endsection
