@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brands List <span class="badge badge-pill badge-dark">Total : {{ count($brands) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name Eng</th>
                              <th>Name Arab</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($brands as $br)
                          <tr>
                              <td>{{ $br->brand_name_eng }}</td>
                              <td>{{ $br->brand_name_fr }}</td>
                              <td style="vertical-align: middle;text-align: center;"><img src="{{ asset($br->brand_image) }}" width="70px" height="40px"></td>
                              <td style="vertical-align: middle;text-align: center;">
                                <a href="{{ route('brand.edit',$br->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
                                <a href="{{ route('brand.delete',$br->id) }}" title="Delete" id="delete" class="btn btn-danger btn-flat mb-5"><i class="ti-trash"></i></a>
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
                  <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                            @csrf
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_eng" class="form-control"></div>
                                            @error('brand_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_fr" class="form-control"></div>
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