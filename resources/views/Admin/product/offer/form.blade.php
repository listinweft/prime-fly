@extends('Admin.layouts.main')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'/dashboard')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'/product/product_list')}}">Product</a>
                  </li>
                  <li class="breadcrumb-item active">{{$title}}</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         @if (session('success'))
         <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
         </div>
         @elseif(session('error'))
         <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
         </div>
         @endif
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="card card-info">
               <div class="card-header">
                  <h3 class="card-title">Price Form</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="form-row">
                     <!-- <div class="form-group col-md-4">
                        <label> Price*</label>
                        <input type="number" name="pricenormal" id="pricenormal" placeholder="Price"
                               class="form-control required" 
                               value="{{ isset($offer)?$offer->price:'' }}">
                        <div class="help-block with-errors" id="pricenormal_error"></div>
                        </div> -->
                     <div class="form-group col-md-4">
                        <label>  B2b partner*</label>
                        <select name="customer" id="customer"  class="form-control select2 required">
                           <option value="">Select B2b partner</option>
                           @foreach($customerList as $customer)
                           <option value="{{ $customer->user_id }}" {{ in_array($customer->user_id, explode(',', @$offer->user_id)) ? 'selected' : '' }}>
                           {{ $customer->first_name }}
                           </option>
                           @endforeach
                        </select>
                        <div class="help-block with-errors" id="location_error"></div>
                        @error('customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
                  @if ($categorystatus->age_range=="Inactive") 
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <table class="table table-active editprice_table" id="firstpricing">
                        <thead>
                           <tr>
                              <th>Price List *</th>
                              <th>Price *</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Price</td>
                              <td>
                                 <input type="text" name="pricenormal" class="form-control" id="pricenormal" value="{{ isset($offer) ? $offer->price : '' }}">
                                 <div class="help-block with-errors" id="pricenormal_error"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>Additional Charges</td>
                              <td>
                                 <input type="text" name="additional_price" class="form-control" value="{{ isset($offer) ? $offer->additional_price : '' }}">
                              </td>
                           </tr>
                           <tr>
                              <!-- <td>Hourly Price</td>
                                 <td>
                                   
                                     <input type="text" name="hourly_price" class="form-control" value="{{ isset($offer) ? $offer->hourly_price : '' }}">
                                 </td> -->
                           </tr>
                           <tr>
                              <td>Additional Hourly Price</td>
                              <td>
                                 <input type="text" name="additional_hourly_price" class="form-control" value="{{ isset($offer) ? $offer->additional_hourly_price : '' }}">
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               @else
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <table class="table table-active editprice_table" id="size_price_listing_table">
                        <thead>
                           <th>Passenger Type *</th>
                           <th> Price *</th>
                        </thead>
                        @if (!isset($product))
                        <tbody>
                           @foreach ($sizes as $size)
                           <tr>
                              <td>
                                 {{$size->title}}
                              </td>
                              <td>
                                 <input type="hidden" name="size[]" id="" value="{{$size->id}}">
                                 <input type="text" name="price[{{$size->id}}]" id="price{{$size->id}}"   class="form-control" value="{{isset($product)?$product->price:''}}">
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                        @else
                        <tbody>
                           @foreach ($sizes as $size)
                           <tr>
                              <td>
                                 {{$size->title}}
                              </td>
                              <td>
                                 @php
                                 $price = App\Models\ProductOfferSize::where('product_id',$product->product_id)->where('size_id',$size->id)->where('user_id',$product->user_id)->first();
                                 @endphp
                                 <input type="hidden" name="size[]" id="" value="{{$size->id}}">
                                 <input type="text" name="price[{{$size->id}}]" id="price" class="form-control" value="{{isset($price)?$price->price:''}}">
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                        @endif
                     </table>
                  </div>
               </div>
               @endif
               <div class="-card-footer">
                  <input type="submit" name="btn_save" value="Submit"
                     class="btn btn-primary pull-left submitBtn">
                  <input type="hidden" name="id" id="id" value="{{ isset($offer)?$offer->id:'0' }}">
                  <input type="hidden" name="product_id" id="product_id" value="{{ isset($offer)?$offer->product_id:'0' }}">
                  <input type="hidden" name="p_id" id="p_id" value="{{ isset($product)?$product->id:'0' }}">
                  <button type="reset" class="btn btn-default">Clear</button>
                  <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                     style="display:none;">
               </div>
               </div>
               
               
            </div>
         </form>
      </div>
   </section>
</div>
<script>
   $(document).ready(function() {
     var categoryEmpty = @json(empty($categorystatus));
     
     if (categoryEmpty->age_range=="Active") {
         $('#size_price_listing_table tbody tr:first-child input[type="text"]').removeClass('required');
         $('input[name="pricenormal"]').attr('required', 'required');
         $('#size_price_listing_table tbody tr:first-child input[type="text"]').removeAttr('required');
     } else {
         $('#size_price_listing_table tbody tr:first-child input[type="text"]').addClass('required');
         $('#size_price_listing_table tbody tr:first-child input[type="text"]').attr('required', 'required');
         $('input[name="pricenormal"]').removeAttr('required');
     }
   });
   
   
     
</script>
@endsection