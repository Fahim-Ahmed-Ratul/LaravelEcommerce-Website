
@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">
        @include('frontend.partials.product-sidebar')
      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3>All Products in <span class="badge badge-info">{{ $category->name }} Category</span></h3>
          @php
            $products=$category->products()->paginate(2);
          @endphp
          @include('frontend.pages.product.partials.all_products')
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
