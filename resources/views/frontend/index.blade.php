
@extends('frontend.main_master')

@section('title')
Amir Home Page - Shopping Online
@endsection

@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          @include('frontend.common.vertical_menu')

          <!-- ================================== TOP NAVIGATION : END ================================== --> 
          
          <!-- ============================================== HOT DEALS ============================================== -->
          @include('frontend.common.hot_deals')

          <!-- ============================================== HOT DEALS: END ============================================== --> 
          
          <!-- ============================================== SPECIAL OFFER ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
               
                <div class="item">
                  <div class="products special-product">
                    @foreach($specialoffres as $spcdl)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$spcdl->id.'/'.$spcdl->product_slug_eng) }}"> <img src="{{ asset($spcdl->product_thumbnail) }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ url('product/details/'.$spcdl->id.'/'.$spcdl->product_slug_eng) }}">{{ $spcdl->product_name_eng }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> ${{ $spcdl->selling_price }} </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                   @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
          <!-- ============================================== PRODUCT TAGS ============================================== -->
          


   @include('frontend.common.tags')



          <!-- /.sidebar-widget --> 
          <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
          <!-- ============================================== SPECIAL DEALS ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Deals</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    @foreach($specialdeal as $spcdl)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$spcdl->id.'/'.$spcdl->product_slug_eng) }}"> <img src="{{ asset($spcdl->product_thumbnail) }}"  alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ url('product/details/'.$spcdl->id.'/'.$spcdl->product_slug_eng) }}">{{ $spcdl->product_name_eng }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> ${{ $spcdl->selling_price }} </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p18.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p17.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p16.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p15.jpg') }}" alt="images">
                                <div class="zoom-overlay"></div>
                                </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p14.jpg') }}"  alt="">
                                <div class="zoom-overlay"></div>
                                </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p13.jpg') }}" alt="image"> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        </div>
        <!-- /.sidemenu-holder --> 
        <!-- ============================================== SIDEBAR : END ============================================== --> 
        
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
              @foreach($sliders as $sld)
              <div class="item" style="background-image: url({{ asset($sld->slider_img) }});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="big-text fadeInDown-1"> {{ $sld->title }} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $sld->description }}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div>
                  <!-- /.caption --> 
                </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item -->
              @endforeach
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          
          <!-- ========================================= SECTION – HERO : END ========================================= --> 
          
          <!-- ============================================== INFO BOXES ============================================== -->
          <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
              <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">free shipping</h4>
                      </div>
                    </div>
                    <h6 class="text">Shipping on orders over $99</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Sale</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra $5 off on all items </h6>
                  </div>
                </div>
                <!-- .col --> 
              </div>
              <!-- /.row --> 
            </div>
            <!-- /.info-boxes-inner --> 
            
          </div>
          <!-- /.info-boxes --> 
          <!-- ============================================== INFO BOXES : END ============================================== --> 
          <!-- ============================================== SCROLL TABS ============================================== -->
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">New Products</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                @foreach($categories as $cat)
                <li><a data-transition-type="backSlide" href="#category{{ $cat->id }}" data-toggle="tab">{{ $cat->category_name_eng }}</a></li>
                @endforeach
                 </ul>
              <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @forelse ($products as $prd)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}"><img src="{{ asset($prd->product_thumbnail) }}" alt=""></a> </div>
                            <!-- /.image -->
                            @if($prd->discount_price == NULL)
                            <div class="tag new"><span>New</span></div>
                                @else
                                @php
                                $discountpercent = ($prd->discount_price/$prd->selling_price) * 100;
                                @endphp
                            
                            <div class="tag hot"><span>{{ round($discountpercent) }}%</span></div>
                            @endif                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}">{{ $prd->product_name_eng }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            @if($prd->discount_price == NULL)
                            <div class="product-price"> <span class="price">${{ $prd->selling_price }} </span> </div>
                            @else 
                            <div class="product-price"> <span class="price">${{ $prd->discount_price }} </span><span class="price-before-discount">${{ $prd->selling_price }}</span> </div>
                            @endif                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $prd->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $prd->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                    </div>
                    @empty
                        <h5 class="text-danger">No products found.</h5>
                    @endforelse
                    <!-- /.item -->
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->
              @foreach($categories as $cat)
              <div class="tab-pane" id="category{{ $cat->id }}">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @php 
                    $catwiseProduct = App\Models\Product::where('cat_id',$cat->id)->orderBy('id','DESC')->get();
                    @endphp
                    @forelse ($catwiseProduct as $prd)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}"><img  src="{{ asset($prd->product_thumbnail) }}" alt=""></a> </div>
                            <!-- /.image -->
                            @if($prd->discount_price == NULL)
                            <div class="tag new"><span>New</span></div>
                                @else
                            <div class="tag hot"><span>{{ round($prd->discount_price) }}%</span></div>
                            @endif
                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}">{{ $prd->product_name_eng }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            @if($prd->discount_price == NULL)
                            <div class="product-price"> <span class="price">${{ $prd->selling_price }} </span> </div>
                            @else 
                            <div class="product-price"> <span class="price">${{ $prd->discount_price }} </span><span class="price-before-discount">${{ $prd->selling_price }}</span> </div>
                            @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                          
                                  <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-shopping-cart"></i> </button>
                          
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                    </div>
                    @empty
                    <h3 class="text-danger">No products found.</h3>
                @endforelse
                    <!-- /.item -->
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              @endforeach
              
            </div>
            <!-- /.tab-content --> 
          </div>
          <!-- /.scroll-tabs --> 
          <!-- ============================================== SCROLL TABS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col -->
              <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.wide-banners --> 
          
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              
                    @foreach ($featuredProduct as $prd)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}"><img  src="{{ asset($prd->product_thumbnail) }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      @if($prd->discount_price == NULL)
                      <div class="tag new"><span>New</span></div>
                          @else
                          @php
                          $percentdiscount = ($prd->discount_price/$prd->selling_price) * 100;
                          @endphp
                      <div class="tag hot"><span>{{ round($percentdiscount) }}%</span></div>
                      @endif                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="{{ url('product/details/'.$prd->id.'/'.$prd->product_slug_eng) }}">{{ $prd->product_name_eng }}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      @if($prd->discount_price == NULL)
                      <div class="product-price"> <span class="price">${{ $prd->selling_price }} </span> </div>
                      @else 
                      <div class="product-price"> <span class="price">${{ $prd->discount_price }} </span><span class="price-before-discount">${{ $prd->selling_price }}</span> </div>
                      @endif                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $prd->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $prd->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                        </ul>
                      </div>
                      <!-- /.action --> 
                    </div>
                    <!-- /.cart --> 
                  </div>
                  <!-- /.product --> 
                  
                </div>
                <!-- /.products --> 
              </div>
              @endforeach
              <!-- /.item -->
            </div>
            <!-- /.home-owl-carousel --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">New Mens Fashion<br>
                        <span class="shopping-needs">Save up to 40% off</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                  <!-- /.new-label --> 
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
              
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.wide-banners --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      @include('frontend.body.brand')

      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
    </div>
    <!-- /.container --> 
  </div>

  @endsection
