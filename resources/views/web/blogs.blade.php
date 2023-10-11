

@extends('web.layouts.main')
@section('content')

<main class="blog-page">
            <section class="blogs mt-76">
                <div class="blog-container">
                    <div class="custom-search">
                        <form action="#0">
                            <div class="form-grid">
                                <input type="search" name="" id="main-search" placeholder="Search">
                            </div>
                            <div class="searchResult">
                            <ul id="search-result-append-here"></ul>
                        </div>
                        </form>
                        <div class="search-icon"><img src="images/icon/search-icon.png" alt=""></div>
                    </div>
                    <section>
                        <div class="blogs_grid_wrapper">
                            <div class="row">
                               
                            @include('web._blog_list')
                                
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </main>

   


    @endsection
@push('scripts')

@endpush

