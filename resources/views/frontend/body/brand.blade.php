<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        @php 
        $brands = App\Models\Brand::orderBy('brand_name_eng','ASC')->get();
        @endphp
        @foreach($brands as $br)
        <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{ asset($br->brand_image) }}" src="{{ asset($br->brand_image) }}" alt=""> </a> </div>
        @endforeach
      </div>
      <!-- /.owl-carousel #logo-slider --> 
    </div>
    <!-- /.logo-slider-inner --> 
    
  </div>