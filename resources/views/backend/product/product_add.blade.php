@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">
 
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		 	@csrf

					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h5>Brand <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="brand_id" class="form-control">
			<option value="" selected="" disabled="">Select </option>
			@foreach($brands as $brand)
 <option value="{{ $brand->id }}">{{ $brand->brand_name_eng }}</option>	
			@endforeach
		</select>
		@error('brand_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h5>Category <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="cat_id" class="form-control">
			<option value="" selected="" disabled="">Select </option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}">{{ $category->category_name_eng }}</option>	
			@endforeach
		</select>
		@error('cat_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
	<h5>SubCategory <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control">
			<option value="" selected="" disabled="">Select </option>
			 
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->



<div class="row"> <!-- start 2nd row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h5>Sub-SubCategory <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subsubcategory_id" class="form-control">
			<option value="" selected="" disabled="">Select </option>
		 
		</select>
		@error('subsubcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Name in English <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_name_eng" class="form-control" >
     @error('product_name_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Name in Arabic <span class="text-danger">*</span></h5>
			<div class="controls">
				<input dir="rtl" type="text" name="product_name_ar" class="form-control" >
     @error('product_name_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 2nd row  -->



<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-4">

	  <div class="form-group">
			<h5>Product Code <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
				<input type="text" name="product_code" class="form-control" >
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Quantity <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_qty" class="form-control" >
     @error('product_qty') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Tags in English <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_tags_eng" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" >
     @error('product_tags_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 3RD row  -->






<div class="row"> <!-- start 4th row  -->
			<div class="col-md-4">

	    <div class="form-group">
			<h5>Product Tags in Arabic <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input dir="rtl" type="text" name="product_tags_ar" class="form-control" value="غوشي,اطلالة,حرير" data-role="tagsinput" >
     @error('product_tags_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Size in English <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
	 <input type="text" name="product_size_eng" class="form-control" value="Small,Midium,Large" data-role="tagsinput" >
     @error('product_size_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Size in Arabic <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
	 <input dir="rtl" type="text" name="product_size_ar" class="form-control" value="صغير,متوسط,كبير جدا" data-role="tagsinput" >
     @error('product_size_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 4th row  -->

		 

<div class="row"> <!-- start 5th row  -->
			<div class="col-md-4">

	    <div class="form-group">
			<h5>Product Color in English <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_color_eng" class="form-control" value="red,Black,Amet" data-role="tagsinput" >
     @error('product_color_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Color in Arabic <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_color_ar" class="form-control" value="أحمر,أزرق,أخضر" data-role="tagsinput" >
     @error('product_color_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				<div class="form-group">
			<h5>Product Selling Price <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="selling_price" class="form-control" >
     @error('selling_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 5th row  -->




<div class="row"> <!-- start 6th row  -->
			<div class="col-md-4">

	    <div class="form-group">
			<h5>Product Discount Price <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
	 <input type="text" name="discount_price" class="form-control"  >
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

	    <div class="form-group">
			<h5>Main Thumbnail <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="product_thumbnail" class="form-control" onChange="mainThamUrl(this)" >
     @error('product_thumbnail') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

	    <div class="form-group">
			<h5>Multiple Image <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
	 <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >
     @error('multi_img') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <div class="row" id="preview_img"></div>

	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 6th row  -->





<div class="row"> <!-- start 7th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Short Description in English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_desc_eng" id="textarea" class="form-control" placeholder="Write here..."></textarea>  
	@error('short_desc_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror   
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Short Description in Arabic <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea dir="rtl" name="short_desc_ar" id="textarea" class="form-control" placeholder="اكتب هنا..."></textarea>     
	@error('short_desc_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror  
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 7th row  -->

		
		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">

	    <div class="form-group">
			<h5>Long Description in English <span class="text-dark">(Optional)</span></span></h5>
			<div class="controls">
	<textarea id="editor1" name="long_desc_eng" rows="10" cols="80" >
						</textarea>  
	 		 </div>
		</div>
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	     <div class="form-group">
			<h5>Long Description in Arabic <span class="text-dark">(Optional)</span></h5>
			<div class="controls">
	<textarea id="editor2" name="long_desc_ar" rows="10" cols="80">
						</textarea>       
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>
 


	<div class="row">

<div class="col-md-6">
			<div class="form-group">
			 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
				<label for="checkbox_2">Hot Deals</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="featured" value="1">
				<label for="checkbox_3">Featured</label>
			</fieldset>
		</div>
	</div>
</div>



<div class="col-md-6">
	<div class="form-group">
		 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_4" name="special_price" value="1">
				<label for="checkbox_4">Special Offer</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
				<label for="checkbox_5">Special Deals</label>
			</fieldset>
		</div>
			</div>
		</div>
		 </div>



<div class="col-md-6">
				 
				
			</div> <!-- end col md 4 -->




						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Done">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
 
 <script type="text/javascript">
         $(document).ready(function() {
        $('select[name="cat_id"]').on('change', function(){
            var cat_id = $(this).val();
            if(cat_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+cat_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcat_name_eng + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
   
     $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_eng + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    });
</script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection