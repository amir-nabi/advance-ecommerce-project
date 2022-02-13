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
                        <form method="post" action="{{ route('category.update',$categories->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $categories->id }}">
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_eng" class="form-control" value="{{ $categories->category_name_eng }}"></div>
                                            @error('category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ar" class="form-control" value="{{ $categories->category_name_ar }}"></div>
                                            @error('category_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>         
                                    <div class="form-group">
                                        <h5>Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control" value="{{ $categories->category_icon }}"></div>
                                            @error('category_icon')
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