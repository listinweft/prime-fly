@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}} Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'administration')}}">Admin
                                    list</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}} Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    
                        
                        <div class="card-body">
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
                         
                           
                            
                            </div>
                        </div>
                  
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Authentication Permissions</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-{{ isset($admin)?'6':'4' }}">
                                    <label for="role">Admin*</label>
                                    <select class="form-control required" name="role" id="role">
                                        <option value="">Select Admin</option>
                                        @foreach($admins as $admin)
        @if($admin->user->id == $role)
            <option value="{{ $admin->user->id }}" selected>{{ $admin->name }}</option>
        @endif
    @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="role_error"></div>
                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md">
                                    <label for="role">Location*</label>
                                  
                                      
             

             
             
    @foreach($locations as $location)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="location_ids[]"
            value="{{ $location->id }}"
            {{ in_array($location->id, explode(',', $user->location_ids ?? '')) ? 'checked' : '' }}>
        <label class="form-check-label">{{ $location->title }}</label>
    </div>
@endforeach

    


                                    </select>
                                    <div class="help-block with-errors" id="role_error"></div>
                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
  
@endsection
