<div class="col-lg-4 sticky-lg-top sticky-lg-top-110 desk_filter_box">
    <a class="btn primary_btn primary_btn_mb" data-bs-toggle="offcanvas" href="#offcanvasExample"
       role="button" aria-controls="offcanvasExample">
        <div class="d-flex flex-row align-items-center">
            <img src="{{asset('frontend/images/svg/filter-list.svg')}}" alt="...">
            Category
        </div>
    </a>
    <div class="offcanvas offcanvas-start category_canvas" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body">
            <form id="filter-form" method="post">
                <div class="category_area">
                    <h6 class="heading">
                        <div> Filter</div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </h6>
                    <div class="ProductListCategory">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                               
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        @foreach($parentCategories as $parent)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="{{ $parent->title }}">
                                             
                                                    <button type="button"
                                                            class="accordion-button  {{ ($loop->iteration ==1)?'':'collapsed' }}"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#{{ $parent->short_url }}"
                                                            aria-expanded="{{ ($loop->iteration ==1)?'true':'false' }}"
                                                            aria-controls="{{ $parent->short_url }}">
                                                        <div class="form-check">
                                                            {{-- <input type="checkbox"
                                                                   name="category_id[]"
                                                                   id="Category_{{$parent->id}}"
                                                                   data-field="category_id"
                                                                   value="{{ $parent->id }}"
                                                                   data-label="Category"
                                                                   data-title="{{$parent->title}}"
                                                      
                                                                   {{ $parent->short_url == $typeValue?'checked':'' }}
                                                                   class="form-check-input filterItem"> --}}
                                                            <label class="form-check-label"
                                                                   for="Category_{{ $parent->id }}">
                                                                {{ $parent->title }}
                                                            </label>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="{{ $parent->short_url }}"
                                                     class="accordion-collapse collapse {{ ($loop->iteration ==1)?'show':'' }}"
                                                     aria-labelledby="{{ $parent->title }}">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            @foreach($parent->activeChildren as $subCategory)
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input type="checkbox"
                                                                               name="sub_category_id[]" data-parent = "{{ $subCategory->parent_id }}"
                                                                               id="Category_{{$subCategory->id}}"
                                                                               data-field="sub_category_id"
                                                                               value="{{ $subCategory->id }}"
                                                                               data-label="Category"
                                                                               data-title="{{$subCategory->title}}"
                                                                               class="form-check-input filterItem">
                                                                        <label class="form-check-label"
                                                                               for="Category_{{$subCategory->id}}">
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
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseThree3"
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseThree3">
                                        <div class="form-check title">
                                            <input class="form-check-input" type="checkbox"
                                                   checked="checked" value="" id="color">
                                            <label class="form-check-label label_bold allCategory" for="color">
                                                Colours
                                            </label>
                                        </div>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree3"
                                     class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingThree3">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach($colors as $color)
                                                <li>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="color_id[]"
                                                               id="Color_{{$color->id}}" data-field="color_id"
                                                               value="{{ $color->id }}" data-label="Color"
                                                               data-title="{{$color->title}}"
                                                               {{ $color->short_url == $typeValue?'checked':'' }}
                                                               class="form-check-input filterItem">
                                                        <label class="form-check-label" for="Color_{{ $color->id }}">
                                                            {{ $color->title }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
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
        </div>
    </div>
</div>
