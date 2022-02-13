@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub-SubCategory List <span class="badge badge-pill badge-dark">Total : {{ count($subsubcategory) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category </th>
								<th>SubCategory </th>
								<th>Sub-Subcategory in English </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($subsubcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_eng'] }}  </td>
		<td>{{ $item['subcategory']['subcat_name_eng'] }}</td>
		 <td>{{ $item->subsubcategory_name_eng }}</td>
		<td style="vertical-align: middle;text-align: center;" width="30%">
 <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-warning btn-flat mb-5" title="Edit Data"><i class="si-note si"></i> </a>

 <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger btn-flat mb-5" title="Delete Data" id="delete">
 	<i class="ti-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Sub-SubCategory </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('subsubcategory.store') }}" >
	 	@csrf
					   

	 <div class="form-group">
	<h5>Category <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="cat_id" class="form-control"  >
			<option value="" selected="" disabled="">Select</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->category_name_eng }}</option>	
			@endforeach
		</select>
		@error('cat_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>


		  <div class="form-group">
	<h5>SubCategory <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  >
			<option value="" selected="" disabled="">Select</option>
			 
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>


	<div class="form-group">
		<h5>Sub-SubCategory in English <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_eng" class="form-control" >
     @error('subsubcategory_name_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Sub-SubCategory in Arabic  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_ar" class="form-control" >
     @error('subsubcategory_name_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Done">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
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
    });
    </script>


@endsection