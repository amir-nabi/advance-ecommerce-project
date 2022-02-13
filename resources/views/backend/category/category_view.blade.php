@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Categories List <span class="badge badge-pill badge-dark">Total : {{ count($categories) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Icon</th>
                              <th>Name Eng</th>
                              <th>Name Arab</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($categories as $ctg)
                          <tr>
                              <td style="vertical-align: middle;text-align: center;"><span><i class="{{ $ctg->category_icon }}"></i></span></td>
                              <td>{{ $ctg->category_name_eng }}</td>
                              <td>{{ $ctg->category_name_ar }}</td>
                              <td style="vertical-align: middle;text-align: center;">
                                <a href="{{ route('category.edit',$ctg->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
                                <a href="{{ route('category.delete',$ctg->id) }}" title="Delete" id="delete" class="btn btn-danger btn-flat mb-5"><i class="ti-trash"></i></a>
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
                  <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_eng" class="form-control"></div>
                                            @error('category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input dir="rtl" type="text" name="category_name_ar" class="form-control"></div>
                                            @error('category_name_fr')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>         
                                    <div class="form-group">
                                        <h5>Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"></div>
                                            @error('category_icon')
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