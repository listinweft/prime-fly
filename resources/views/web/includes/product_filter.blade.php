
<form id="filter-form" method="post">
<div class="accordion" id="accordionPanelsStayOpenExample">
                  
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="" aria-controls="">
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
                                                                        <input class="form-check-input filterItem" type="checkbox" value="{{$subCategory->id}}"  name="sub_category_id[]" data-parent = "{{ $subCategory->parent_id }}"
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
                @foreach($colors as $color)
                    <a href="javascript:void(0)" class="colorItem colorItemFilterClick">
                        <input type="checkbox"  name="color_id[]" id="Color_{{$color->id}}" data-field="color_id"
                                                               value="{{ $color->id }}" data-label="Color"
                                                               data-title="{{$color->title}}"
                                                               {{ $color->short_url == $typeValue?'checked':'' }}
                                                               class="form-check-input filterItem d-none">
                        <label for="Color_{{$color->id}}" class="colorBox" style="background:{{$color->code}}">
                        </label>
                    </a>
                    @endforeach
                    
                    
                    
                   
                    
                    
                   
                    
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
                    <div class="price-ranges">
                                            <h4>Price Range</h4>
                                            <p>Range : {{Helper::defaultCurrency()}}
                                                {{ Helper::getMinPrice() }} - {{Helper::defaultCurrency()}}
                                                {{ Helper::getMaxPrice() }}</p>
                                            <div class="price-range-slider">
                                                <div id="slider-range" class="range-bar range_bar_sort"></div>
                                                <p class="range-value">
                                                    <input type="text" id="amount" name="my_range"
                                                           value="AED{{ Helper::getMinPrice() }}-AED{{ Helper::getMaxPrice() }}"
                                                           data-min="{{ Helper::getMinPrice() }}"
                                                           data-max="{{ Helper::getMaxPrice() }}"
                                                           data-from="{{ Helper::getMinPrice() }}"
                                                           data-to="{{ Helper::getMaxPrice() }}">
                                                </p>
                                            </div>
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
            @foreach($shapes as $shape)
                <a href="javascript:void(0)" class="shapeFilterClick">
                    <label for="Shape_{{$shape->id}}">
                        {!! Helper::printImage($shape, 'image', 'image_webp', '', 'img-fluid') !!}
                        <h6>{{ @$shape->title }}</h6>
                    </label>
                    <input type="checkbox"  name="shape_id[]" id="Shape_{{$shape->id}}" data-field="shape_id"
                                                               value="{{ $shape->id }}" data-label="Shape"
                                                               data-title="{{$shape->title}}"
                                                               {{ $color->short_url == $typeValue?'checked':'' }}
                                                               class="form-check-input filterItem d-none">
                </a>
                @endforeach
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
            
                @foreach($tags as $tag)
                                                
                <label for="tag_{{$tag->id}}"  class="tagFilterClick">
                    <label class="d-block" for="tag_{{$tag->id}}">{{ @$tag->title }}</label>
                    <input type="checkbox"  name="tag_id[]" id="tag_{{$tag->id}}" data-field="tag_id"
                                                               value="{{ $tag->id }}" data-label="Tag"
                                                               data-title="{{$tag->title}}"
                                                               {{ $color->short_url == $typeValue?'checked':'' }}
                                                               class="form-check-input filterItem d-none">
                </label>
               
                @endforeach
            </div>

            <!-- <div class="productTagArea">
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
                <a href="javascript:void(0)" class="tagFilterClick toggleable" style="display: none;">
                    Contemporary
                </a>
                <a href="javascript:void(0)" class="tagFilterClick toggleable" style="display: none;">
                    Texture
                </a>
                <a href="javascript:void(0)" class="tagFilterClick toggleable" style="display: none;">
                    Illustration
                </a>
                <a href="javascript:void(0)" class="tagFilterClick toggleable" style="display: none;">
                    Gestural
                </a>
            </div> -->
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