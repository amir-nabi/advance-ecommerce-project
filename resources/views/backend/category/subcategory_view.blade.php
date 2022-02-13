@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">SubCategories List <span class="badge badge-pill badge-dark">Total : {{ count($subcategories) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>Name Eng</th>
                              <th>Name Arab</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($subcategories as $ctg)
                          <tr>
                              <td style="vertical-align: middle;text-align: center;">{{ $ctg->cat_id }}</td>
                              <td>{{ $ctg->subcat_name_eng }}</td>
                              <td>{{ $ctg->subcat_name_ar }}</td>
                              <td style="vertical-align: middle;text-align: center;">
                                <a href="{{ route('subcategory.edit',$ctg->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>
                                <a href="{{ route('subcategory.delete',$ctg->id) }}" title="Delete" id="delete" class="btn btn-danger btn-flat mb-5"><i class="ti-trash"></i></a>
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
                  <h3 class="box-title">Add SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('subcategory.store') }}">
                            @csrf

                            
                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <select name="cat_id" class="form-control">
                                            <option value="" selected="" disabled="">Select</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name_eng }}</option>
                                            @endforeach
                                        </select>
                                            @error('cat_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>         
                                    <div class="form-group">
                                        <h5>Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcat_name_eng" class="form-control"></div>
                                            @error('subcat_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Name in Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input dir="rtl" type="text" name="subcat_name_ar" class="form-control"></div>
                                            @error('subcat_name_ar')
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