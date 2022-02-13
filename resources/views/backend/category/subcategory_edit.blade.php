@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('subcategory.update',$subcategories->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subcategories->id }}">
                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <select name="cat_id" class="form-control">
                                            <option value="" disabled="">Select</option>
                                            @foreach($categories as $cat)
                                            <option {{ $cat->id == $subcategories->cat_id ? 'selected': '' }} value="{{ $cat->id }}">{{ $cat->category_name_eng }}</option>
                                            @endforeach
                                        </select>
                                            @error('cat_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>         
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcat_name_eng" class="form-control" value="{{ $subcategories->subcat_name_eng }}"></div>
                                            @error('subcat_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcat_name_ar" class="form-control" value="{{ $subcategories->subcat_name_ar }}"></div>
                                            @error('subcat_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>          
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
@endsection