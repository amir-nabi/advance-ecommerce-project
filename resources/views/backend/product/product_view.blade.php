@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Productkkkks List <span class="badge badge-pill badge-dark">Total : {{ count($products) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Discount</th>
                              <th>Quantity</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $prd)
                          <tr>
                              <td style="vertical-align: middle;text-align: center;"><img src="{{ asset($prd->product_thumbnail) }}" style="width: 80%; height: 60px;"></td>
                              <td>{{ $prd->product_name_eng }}</td>
                              <td>{{ $prd->selling_price }} £</td>
                              <td>
                                @if($prd->discount_price == NULL)
                                <span class="badge badge-pill badge-danger">No Discount</span>
                   
                                @else
                                @php
                                $discount = ($prd->discount_price/$prd->selling_price) * 100;
                                $new_price = $prd->selling_price - $prd->discount_price;
                                @endphp
                      <span>{{ round($discount)  }}% [{{ $new_price }}£]</span>
                   
                                @endif
                              </td>
                              <td>{{ $prd->product_qty }}</td>
                              <td style="text-align: center;">
                                  @if($prd->status == 1)
                                  <span class="badge badge-pill badge-success">Active</span>
                                  @else
                                  <span class="badge badge-pill badge-danger">Inactive</span>
                                  @endif
                              </td>
                              <td style="vertical-align: middle;text-align: center;">
                                <a href="{{ route('product.info',$prd->id) }}" title="Info" class="btn btn-primary btn-flat mb-5"><i class="fa fa-info-circle"></i></a>
                                @if($prd->status == 1)
                                <a href="{{ route('product.inactive',$prd->id) }}" title="Deactivate" class="btn btn-secondary btn-flat mb-5"><i class="fa fa-eye-slash"></i></a>
                                  @else
                                  <a href="{{ route('product.active',$prd->id) }}" title="Activate" class="btn btn-secondary btn-flat mb-5"><i class="fa fa-eye"></i></a>
                                  @endif
                                <a href="{{ route('product.edit',$prd->id) }}" title="Edit" class="btn btn-warning btn-flat mb-5"><i class="si-note si"></i></a>    
                                <a href="{{ route('product.delete',$prd->id) }}" title="Delete" id="delete" class="btn btn-danger btn-flat mb-5"><i class="ti-trash"></i></a>
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
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
@endsection