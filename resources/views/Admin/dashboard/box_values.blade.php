<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$processingOrders}}</h3>
                <p>Total Members</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <!-- <a href="{{url(Helper::sitePrefix().'report/order/processing')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$ohHoldOrders}}</h3>
                <p>Total Journals</p>
            </div>
            <div class="icon">
                <i class="journal-icon fas fa-book"></i>
            </div>
            <!-- <a href="{{url(Helper::sitePrefix().'report/order/on hold')}}" class="small-box-footer">More info
                <i
                    class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$outOfStock}}</h3>
                <p>Total Blogs</p>
            </div>
            <div class="icon">
                <i class="blog-icon fas fa-file-alt"></i>
            </div>
            <!-- <a href="{{url(Helper::sitePrefix().'report/product/out-of-stock')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$todaySales}}</h3>
                <p>Total Events</p>
            </div>
            <div class="icon">
                <i class="total-events-icon fas fa-calendar"></i>
            </div>
            {{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$monthSales}}</h3>
                <p>Total Enquiries</p>
            </div>
            <div class="icon">
                <i class="total-enquiries-icon fas fa-question-circle"></i>
            </div>
            {{--            <a href="{{url('job/Completed')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>0</h3>
                <p>Total Posts</p>
            </div>
            <div class="icon">
                <i class="otal-posts-icon fas fa-pencil-alt"></i>
            </div>
            {{--            <a href="{{url('pending-jobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        </div>
    </div>
    <!-- ./col -->
</div>
