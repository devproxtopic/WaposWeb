@extends('layouts.sharable')

@section('content')
<div class="container">
<section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <div class="section-title" data-aos="fade-right">
              <h2>WAPOS</h2>
              <p>Proxtopic te ha compartido un producto que te puede interesar</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="row">

              <div class="col-lg-12">
                <div class="member row">
                  <div class="col-lg-6"><img src="{{ URL::asset('storage/'.$product->image) }}" class="img-fluid" alt=""></div>
                  <div class="member-info col-lg-6">
                    <h1>{{$product->title}}</h1>
                    <span style="text-left">Description: {{$product->description}}</span>
                    <h3>${{$product->price}}</h3>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Team Section -->
</div>
@endsection
