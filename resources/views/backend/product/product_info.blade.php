@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <section class="content">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="box-title">Product Name : {{ $products->product_name_eng }}</h4>
                            <br><br>
                            <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top" style="height: 250px; width: 400px;">
                    </div>
                    <div class="col-6">
                        <br><br><br>
                        @foreach($brands as $brand)
                            @if ($brand->id == $products->brand_id)
                            <h5>Brand : {{ $brand->brand_name_eng }}</h5>	
                            @endif
                        @endforeach                    
                        @foreach($categories as $category)
                            @if ($category->id == $products->cat_id)
                            <h5>Category : {{ $category->category_name_eng }}</h5>	
                            @endif
                        @endforeach
                        @foreach($subcategory as $sub)
                            @if ($sub->id == $products->subcategory_id)
                            <h5>Subcategory : {{ $sub->subcat_name_eng }}</option>	
                            @endif
                        @endforeach
                        @foreach($subsubcategory as $subsub)
                            @if($subsub->id == $products->subsubcategory_id)
                            <h5>Sub-Subcategory : {{ $subsub->subsubcategory_name_eng }}</h5>
                            @endif	
                        @endforeach
                            <h5>Description : {{ $products->long_desc_eng }}</h5>
                            <h5>Size : {{ $products->product_size_eng }}</h5>
                            <h5>Price : {{ $products->selling_price }}</h5>
                    </div>
                    </div>
                    <div class="row">
                        @foreach($multiImgs as $img)
                       <div class="col-md-3" style="margin-right:auto; margin-left:auto">
       
       <div class="card">
         <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 150px; width: 200px;">
       </div> 		
                       
                       </div><!--  end col md 3		 -->	
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
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