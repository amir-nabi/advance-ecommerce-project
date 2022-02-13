@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Sliders List <span class="badge badge-pill badge-dark">Total : {{ count($sliders) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($sliders as $br)
                          <tr>
                            <td><img src="{{ asset($br->slider_img) }}" width="70px" height="40px"></td>
                            <td style="vertical-align: middle;text-align: center;">@if($br->title == NULL ) <i class="fa fa-ban" aria-hidden="true"></i> @else {{ $br->title }} @endif</td>
                            <td style="vertical-align: middle;text-align: center;">@if($br->description == NULL ) <i class="fa fa-ban" aria-hidden="true"></i> @else {{ $br->description }} @endif</td>
                            <td>
                                @if($br->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif
                            </td>
                              <td style="vertical-align: middle;text-align: center;">
                                <a href="{{ route('slider.edit',$br->id) }}" title="Info" class="btn btn-primary btn-flat mb-5"><i class="fa fa-info-circle"></i></a>
                                @if($br->status == 1)
                                <a href="{{ route('slider.inactive',$br->id) }}" title="Deactivate" class="btn btn-secondary btn-flat mb-5"><i class="fa fa-eye-slash"></i></a>
                                  @else
                                  <a href="{{ route('slider.active',$br->id) }}" title="Activate" class="btn btn-secondary btn-flat mb-5"><i class="fa fa-eye"></i></a>
                                  @endif
                                <a href="{{ route('slider.edit',$br->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>    
                                <a href="{{ route('slider.delete',$br->id) }}" title="Delete" id="delete" class="btn btn-danger btn-flat mb-5"><i class="ti-trash"></i></a>
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

          <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Slider</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control"></div>
                                
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control"></div>
                                            @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror  
                                    </div>                           
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Done">
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