@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('brand.update',$brands ->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $brands->id }}">
                            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_eng" value="{{ $brands->brand_name_eng }}" class="form-control"></div>
                                            @error('brand_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_fr" value="{{ $brands->brand_name_fr }}" class="form-control"></div>
                                            @error('brand_name_fr')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"></div>
                                            @error('brand_image')
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