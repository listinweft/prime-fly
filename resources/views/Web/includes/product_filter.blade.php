
<form id="filter-form" method="post">
<div class="accordion" id="accordionPe">
                  
    <div class="accordion-item">
        <h2 class="accordion-header" id="">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="" aria-controls="">
                <div class="form-check title">
                    <label class="form-check-label label_bold" for="">
                    Category
                    </label>
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <div class="accordion" id="accordionPanelsStayOpenExample">
                @foreach($parentCategories as $parent)
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne1">
                                                        <button class="accordion-button {{ ($loop->iteration ==1)?'':'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $parent->short_url }}" aria-expanded="{{ ($loop->iteration ==1)?'true':'false' }}" aria-controls="{{ $parent->short_url }}">
                                                            <div class="form-check">
                                                                <input class="form-check-input" checked type="checkbox" value="" id="flexCheckDefault01">
                                                                <label class="form-check-label" for="Category_{{ $parent->id }}">
                                                                {{ $parent->title }}
                                                                </label>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="{{ $parent->short_url }}" class="accordion-collapse collapse show {{ ($loop->iteration ==1)?'show':'' }}" aria-labelledby="{{ $parent->title }}">
                            <div class="accordion-body">
                                <ul>
                                    
                                @foreach($parent->activeChildren as $subCategory)
                                    
                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input filterItem" type="checkbox" value="{{$subCategory->id}}" id="flexCheckDefault02" name="sub_category_id[]" data-parent = "{{ $subCategory->parent_id }}"
                                                                               id="Category_{{$subCategory->id}}"
                                                                               data-field="sub_category_id"
                                                                               value="{{ $subCategory->id }}"
                                                                               data-label="Category"
                                                                               data-title="{{$subCategory->title}}">
                                                                        <label class="form-check-label" for="Category_{{$subCategory->id}}">
                                                                        {{ $subCategory->title }}
                                                                        </label>
                                                                    </div>
                                                                </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                <div class="form-check title">
                    <label class="form-check-label label_bold" for="flexCheckDefault">
                        Color
                    </label>
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="colorWrapper">
                    <a href="javascript:void(0)" class="colorItem colorItemFilterClick">
                        <div class="colorBox" style="background: #292929">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #FFFFFF">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #71A9BA">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #637372">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #F5F4DF">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #75829D">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #BDB8CE">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #FBC9CC">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #EF7F55">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #BDC39F">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #E1C564">
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="colorItemFilterClick">
                        <div class="colorBox" style="background: #C4CACE">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                <div class="form-check title">
                    <label class="form-check-label label_bold" for="flexCheckDefault">
                        Price
                    </label>
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
            <div class="priceRagerArea">
                <div class="slider-range-wrap">
                    <div class="currencyBox">AED</div>
                    <div id="slider-range"></div>
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <span class="min-range">100</span>
                        <span class="max-range">1,000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                <div class="form-check title">
                    <label class="form-check-label label_bold" for="flexCheckDefault">
                        SHAPE
                    </label>
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
            <div class="shapeArea">
                <a href="javascript:void(0)" class="shapeFilterClick">
                    <img class="Img-fluid" src="assets/images/shapePortrait.jpg" alt="">
                    <h6>Portrait</h6>
                </a>
                <a href="javascript:void(0)" class="shapeFilterClick">
                    <img class="Img-fluid" src="assets/images/shapeLandscape.jpg" alt="">
                    <h6>Landscape</h6>
                </a>
                <a href="javascript:void(0)" class="shapeFilterClick">
                    <img class="Img-fluid" src="assets/images/shapeSquare.jpg" alt="">
                    <h6>Square</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
                <div class="form-check title">
                    <label class="form-check-label label_bold" for="flexCheckDefault">
                        Product tags
                    </label>
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
            <div class="productTagArea">
                <a href="javascript:void(0)" class="tagFilterClick">
                    Seascape
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Canvas
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Acrylic
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Art
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Abstract
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Contemporary
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Texture
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Illustration
                </a>
                <a href="javascript:void(0)" class="tagFilterClick">
                    Gestural
                </a>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="sort_value" name="sort_value"
                       value="{{ $sort_value }}">
                <input type="hidden" id="input_field" name="input_field">
                <input type="hidden" name="pageType" id="type" value="{{$type}}">
                <input type="hidden" name="typeValue" id="typeValue" value="{{$typeValue}}">
                <input type="hidden" name="title" id="title" value="{{$title}}">

                <input type="hidden" id="loading_offset" name="loading_offset"
                       value="{{$offset}}">
                <input type="hidden" id="loading_limit" name="loading_limit"
                       value="{{$loading_limit}}">
</form>