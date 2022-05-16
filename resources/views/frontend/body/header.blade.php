<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              @if(session()->get('language') == 'english')
              @auth
              <li><a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>My Account</a></li>
              @endauth
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
              @auth
              <li><a href="{{ route('user.logout') }}"><i class="icon fa fa-lock"></i>Logout</a></li>
              @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
              @endauth
              @else
              @auth
              <li><a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>حسابي</a></li>
              @endauth
              <li><a href="#"><i class="icon fa fa-heart"></i>قائمة الرغبات</a></li>
              <li><a href="#"><i class="icon fa fa-shopping-cart"></i>عربة التسوق الخاصة بي</a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>الدفع</a></li>
              @auth
              <li><a href="{{ route('user.logout') }}"><i class="icon fa fa-lock"></i> خروج</a></li>
              @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>الدخول/التسجيل</a></li>
              @endauth
              @endif
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> 
                @if(session()->get('language') == 'english')
                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD $ </span><b class="caret"></b></a>
                @else
                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">$ دولار أمريكي </span><b class="caret"></b></a>
                @endif
                @if(session()->get('language') == 'english')
                <ul class="dropdown-menu">
                  <li><a href="#">USD $</a></li>
                  <li><a href="#">EUR €</a></li>
                  <li><a href="#">GBP £</a></li>
                </ul>
                @else
                <ul class="dropdown-menu">
                  <li><a href="#">$ دولار أمريكي</a></li>
                  <li><a href="#">€ يورو</a></li>
                  <li><a href="#">£ الجنيه الاسترليني</a></li>
                </ul>
                @endif
              </li>
              <li class="dropdown dropdown-small"> 
                @if(session()->get('language') == 'english')
                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><i style="margin-right: 3px" class="flag-icon flag-icon-gb" title="gb" id="gb"></i> English  </span><b class="caret"></b></a>
                @else 
                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><i style="margin-right: 3px" class="flag-icon flag-icon-tn" title="tn" id="tn"></i> العربية  </span><b class="caret"></b></a>
                @endif
                <ul class="dropdown-menu">
                  <li><a href="{{ route('english.language') }}"><i class="flag-icon flag-icon-gb" title="gb" id="gb"></i> English 
                  </a></li>
                  <li><a href="{{ route('arabic.language') }}"><i class="flag-icon flag-icon-tn" title="tn" id="tn"></i> العربية</a></li>
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend/assets/images/logo.jpeg') }}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            @if(session()->get('language') == 'english')
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search here..." />
                  <button class="search-button" type="submit"></button> </div>
                </form>
                <div id="searchProducts"></div>
            </div>
            @else 
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">فئات <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">الحاسوب</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">ملابس</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">إلكترونيات</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">أحذية</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">ساعات</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" dir="rtl" placeholder="ابحث هنا..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            @endif
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ===== === SHOPPING CART DROPDOWN ===== == -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
    <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> 
                <span class="total-price"> <span class="sign">$</span>
                <span class="value" id="cartSubTotal"> </span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
         <!--   // Mini Cart Start with Ajax -->

         <div id="miniCart">
           
         </div>
 
<!--   // End Mini Cart Start with Ajax -->


                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span>
                    <span class='price'  id="cartSubTotal">  </span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- == === SHOPPING CART DROPDOWN : END=== === -->  <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'english') Home @else الصفحة الرئيسية @endif</a> </li>
                  @if(session()->get('language') == 'english')
                  @php
                              $categories = App\Models\Category::orderBy('category_name_eng','ASC')->get();
                  @endphp
                  
                  @foreach($categories as $cat)
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $cat->category_name_eng }}</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @php 
                  $subcategories = App\Models\SubCategory::where('cat_id',$cat->id)->orderBy('subcat_name_eng','ASC')->get();
                  @endphp
                  @foreach($subcategories as $subcat)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcat_slug_eng ) }}">
                              <h2 class="title">{{ $subcat->subcat_name_eng }}</h2></a>
                              @php 
                              $sub_subcategories = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_eng','ASC')->get();
                              @endphp
                              <ul class="links">
                                @foreach($sub_subcategories as $subsubcat)
                                <li><a href="{{ url('subsubcategory/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_eng ) }}">{{ $subsubcat->subsubcategory_name_eng }}</a></li>
                               @endforeach
                              </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                            
                    
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  @else 
                  @php 
                  $categories = App\Models\Category::orderBy('category_name_ar','ASC')->get();
                  @endphp
                  @foreach($categories as $cat)
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $cat->category_name_ar }}</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @php 
                  $subcategories = App\Models\SubCategory::where('cat_id',$cat->id)->orderBy('subcat_name_ar','ASC')->get();
                  @endphp
                  @foreach($subcategories as $subcat)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">{{ $subcat->subcat_name_ar }}</h2>
                              @php 
                              $sub_subcategories = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_ar','ASC')->get();
                              @endphp
                              <ul class="links">
                                @foreach($sub_subcategories as $subsubcat)
                                <li><a href="#">{{ $subsubcat->subsubcategory_name_ar }}</a></li>
                               @endforeach
                              </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                            
                    
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  @endif
                  
                  
                  <li class="dropdown  navbar-right special-menu"> <a href="#">@if(session()->get('language') == 'english') Todays offer @else عرض اليوم @endif </a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>

  <style>
  
    .search-area{
      position: relative;
    }
      #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
      }
    </style>
    
    
    <script>
      function search_result_hide(){
        $("#searchProducts").slideUp();
      }
       function search_result_show(){
          $("#searchProducts").slideDown();
      }
    </script>