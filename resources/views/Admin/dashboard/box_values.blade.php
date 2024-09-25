<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->

        <a href="{{url(Helper::sitePrefix().'customer')}}" class="small-box-footer">

        <div class="small-box bg-info">

            <div class="inner">
                <h3>{{$Totalcustomer}}</h3>
                <p>Total Customers</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
          
               
        </div>

        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->

        <a href="{{url(Helper::sitePrefix().'order')}}" class="small-box-footer">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$Totaljournal}}</h3>
                <p>Total Bookings</p>
            </div>
            <div class="icon">
                <i class="journal-icon fas fa-book"></i>
            </div>
           
       
        </div>

        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->

        <a href="{{url(Helper::sitePrefix().'blog')}}" class="small-box-footer">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$Totalblog}}</h3>
                <p>Total Blogs</p>
            </div>
            <div class="icon">
                <i class="blog-icon fas fa-file-alt"></i>
            </div>
       
        </div>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <a href="{{url(Helper::sitePrefix().'product/category')}}" class="small-box-footer">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$Totalservices}}</h3>
                <p>Total Services</p>
            </div>
            <div class="icon">
                <i class="total-events-icon fas fa-calendar"></i>
            </div>
             
        </div>
        </a>
    </div>
</div>
<div class="row">
   
    <!-- ./col -->
    
    <!-- ./col -->
    <!-- <div class="col-lg-4 col-6">
   
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$TotalPost}}</h3>
                <p>Total Posts</p>
            </div>
            <div class="icon">
                <i class="otal-posts-icon fas fa-pencil-alt"></i>
            </div>
            {{--            <a href="{{url('pending-jobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    
</div> -->
