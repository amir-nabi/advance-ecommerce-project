@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Slider</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sliders->id }}">
                            <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{ $sliders->title }}" class="form-control"></div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" value="{{ $sliders->description }}" class="form-control"></div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control"></div>
                                            @error('slider_img')
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