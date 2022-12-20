<?php include('assets/includes/header.php') ?>

<section class="my_cart_section my_checkout_section">
    <section class="mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-8">
                <div class="checkoutDetailsLeft">
                    <div class="headArea">
                        <h4>
                            Select Shipping Address
                        </h4>
                        <div class="right">
                            <button class="btn secondary_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#shippingAddress" aria-controls="billingAddress"><i class="fa-solid fa-plus"></i> Add Address</button>
                            <div class="slick-address-nav1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="select_billing_address_slider">
                                <div class="select_address_card active">
                                    <h6 class="ads_name">
                                        John George
                                    </h6>
                                    <p class="addressLabel">
                                        Work
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="select_address_card">
                                    <h6 class="ads_name">
                                        John M George
                                    </h6>
                                    <p class="addressLabel">
                                        Home
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <a class="set_d_add" href=""><img src="assets/images/selectSliderActive.png" alt=""> Select</a>
                                    </div>
                                </div>
                                <div class="select_address_card">
                                    <h6 class="ads_name">
                                        John George
                                    </h6>
                                    <p class="addressLabel">
                                        Work
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <a class="set_d_add" href=""><img src="assets/images/selectSliderActive.png" alt=""> Select</a>
                                    </div>
                                </div>
                            </div>

                            <div class="billingAddressOffcanvas position-relative">
                                <div class="offcanvas offcanvas-top add_address_form" data-bs-scroll="true" tabindex="-1" id="shippingAddress" aria-labelledby="offcanvasTopLabel">
                                    <div class="offcanvas-header">
                                        <h4>Add Shipping Address</h4>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" placeholder="Email*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="Phone Number*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" >
                                                    <label for="">Country</label>
                                                    <select name="" id="" class="form-control form_select">
                                                        <option selected disabled value="">Select Country*</option>
                                                        <option value="UAE">UAE</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="India">India</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" >
                                                    <label for="">Emirate</label>
                                                    <select name="" id="" class="form-control form_select">
                                                        <option selected disabled value="">Select Emirate*</option>
                                                        <option value="Abu Dhabi">Abu Dhabi</option>
                                                        <option value="Dubai">Dubai</option>
                                                        <option value="Sharjah">Sharjah</option>
                                                        <option value="Ajman">Ajman</option>
                                                        <option value="Umm Al Quwain">Umm Al Quwain</option>
                                                        <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                                        <option value="Fujairah">Fujairah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Flat Number/Building Name/Gate Number*">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control form-message" placeholder="Address*"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group address_label">
                                                    <lable class="label_cnt">
                                                        <span>Address Label</span>
                                                        (optional)
                                                    </lable>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="addressShipLabel" id="homeShip" value="option1" checked>
                                                            <label class="form-check-label" for="homeShip">
                                                                Home
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="addressShipLabel" id="workShip" value="option2">
                                                            <label class="form-check-label" for="workShip">
                                                                Work
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="headArea">
                        <h4>
                            Select Billing  Address
                        </h4>
                        <div class="right">
                            <button class="btn secondary_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#billingAddress" aria-controls="billingAddress"><i class="fa-solid fa-plus"></i> Add Address</button>
                            <div class="slick-address-nav2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" class="sameShipping">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Same as Shipping Address
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="select_shipping_address_slider">
                                <div class="select_address_card active">
                                    <h6 class="ads_name">
                                        John George
                                    </h6>
                                    <p class="addressLabel">
                                        Work
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="select_address_card">
                                    <h6 class="ads_name">
                                        John M George
                                    </h6>
                                    <p class="addressLabel">
                                        Home
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <a class="set_d_add" href=""><img src="assets/images/selectSliderActive.png" alt=""> Select</a>
                                    </div>
                                </div>
                                <div class="select_address_card">
                                    <h6 class="ads_name">
                                        John George
                                    </h6>
                                    <p class="addressLabel">
                                        Work
                                    </p>
                                    <div class="add_line">
                                        <p>
                                            consectetur adipiscing elit.
                                            nescio, quo modo possit,
                                            United Arab Emirates,
                                            Dubai United Arab Emirates,
                                            Dubai
                                        </p>
                                    </div>
                                    <p class="phone">
                                        Email : asdf@gmail.com
                                    </p>
                                    <p class="phone">
                                        Phone : +971 98989 8989
                                    </p>
                                    <div class="buttons_area">
                                        <a class="edit_add" id="add_address_go" href="javascript:void(0)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        <a class="set_d_add" href=""><img src="assets/images/selectSliderActive.png" alt=""> Select</a>
                                    </div>
                                </div>
                            </div>

                            <div class="billingAddressOffcanvas position-relative">
                                <div class="offcanvas offcanvas-top add_address_form" data-bs-scroll="true" tabindex="-1" id="billingAddress" aria-labelledby="offcanvasTopLabel">
                                    <div class="offcanvas-header">
                                        <h4>Add Billing  Address</h4>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" placeholder="Email*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="Phone Number*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" >
                                                    <label for="">Country</label>
                                                    <select name="" id="" class="form-control form_select">
                                                        <option selected disabled value="">Select Country*</option>
                                                        <option value="UAE">UAE</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="India">India</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" >
                                                    <label for="">Emirate</label>
                                                    <select name="" id="" class="form-control form_select">
                                                        <option selected disabled value="">Select Emirate*</option>
                                                        <option value="Abu Dhabi">Abu Dhabi</option>
                                                        <option value="Dubai">Dubai</option>
                                                        <option value="Sharjah">Sharjah</option>
                                                        <option value="Ajman">Ajman</option>
                                                        <option value="Umm Al Quwain">Umm Al Quwain</option>
                                                        <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                                        <option value="Fujairah">Fujairah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Flat Number/Building Name/Gate Number*">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control form-message" placeholder="Address*"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group address_label">
                                                    <lable class="label_cnt">
                                                        <span>Address Label</span>
                                                        (optional)
                                                    </lable>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="addressShipLabel" id="homeShip" value="option1" checked>
                                                            <label class="form-check-label" for="homeShip">
                                                                Home
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="addressShipLabel" id="workShip" value="option2">
                                                            <label class="form-check-label" for="workShip">
                                                                Work
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="customerNote">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Customer Note (Optional)</label>
                                        <textarea class="form-control form-message" placeholder="Customer Note (Optional)"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                <div class="order_summary">
                    <h5 class="head">Order Summary</h5>

                    <div class="orderProductSummary">
                        <div class="item">
                            <div class="leftImgDetails">
                                <div class="imgBox">
                                    <a href="">
                                        <img class="img-fluid" src="assets/images/product/product04.jpg" loading="lazy" alt="">
                                    </a>
                                </div>
                                <div class="details">
                                    <div>
                                        <a href="">
                                            <h5>
                                                Lorem ipsum dolor.
                                            </h5>
                                            <ul>
                                                <li>
                                                    Shape : <span>Landscape</span>
                                                </li>
                                                <li>
                                                    color : <span>Red</span>
                                                </li>
                                                <li>
                                                    Size : <span>50 X 50</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <ul class="price_area">
                                    <li>AED 250/- </li>
                                    <li>AED 265/-  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="leftImgDetails">
                                <div class="imgBox">
                                    <a href="">
                                        <img class="img-fluid" src="assets/images/product/product03.jpg" loading="lazy" alt="">
                                    </a>
                                </div>
                                <div class="details">
                                    <div>
                                        <a href="">
                                            <h5>
                                                Lorem ipsum dolor.
                                            </h5>
                                            <ul>
                                                <li>
                                                    Shape : <span>Landscape</span>
                                                </li>
                                                <li>
                                                    color : <span>Red</span>
                                                </li>
                                                <li>
                                                    Size : <span>50 X 50</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <ul class="price_area">
                                    <li>AED 250/- </li>
                                    <li>AED 265/-  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="leftImgDetails">
                                <div class="imgBox">
                                    <a href="">
                                        <img class="img-fluid" src="assets/images/product/product01.jpg" loading="lazy" alt="">
                                    </a>
                                </div>
                                <div class="details">
                                    <div>
                                        <a href="">
                                            <h5>
                                                Lorem ipsum dolor.
                                            </h5>
                                            <ul>
                                                <li>
                                                    Shape : <span>Landscape</span>
                                                </li>
                                                <li>
                                                    color : <span>Red</span>
                                                </li>
                                                <li>
                                                    Size : <span>50 X 50</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <ul class="price_area">
                                    <li>AED 250/- </li>
                                    <li>AED 265/-  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="leftImgDetails">
                                <div class="imgBox">
                                    <a href="">
                                        <img class="img-fluid" src="assets/images/product/product05.jpg" loading="lazy" alt="">
                                    </a>
                                </div>
                                <div class="details">
                                    <div>
                                        <a href="">
                                            <h5>
                                                Lorem ipsum dolor.
                                            </h5>
                                            <ul>
                                                <li>
                                                    Shape : <span>Landscape</span>
                                                </li>
                                                <li>
                                                    color : <span>Red</span>
                                                </li>
                                                <li>
                                                    Size : <span>50 X 50</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <ul class="price_area">
                                    <li>AED 250/- </li>
                                    <li>AED 265/-  </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <ul class="calc_area">
                        <li>
                            <div class="left">
                                <h6>Subtotal</h6>
                            </div>
                            <div class="right">
                                <h5>AED 15750.00</h5>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <h6>Tax</h6>
                            </div>
                            <div class="right">
                                <h5>AED 10.00</h5>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <h6>Shipping Charge</h6>
                            </div>
                            <div class="right">
                                <h5>Free Shipping</h5>
                            </div>
                        </li>
                        <li class="couponLi">
                            <form action="">
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control" placeholder="Coupon Code">
                                    <a class="coupon_remove_btn" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                <button class="btn primary_btn">Apply Coupon</button>
                            </form>
                        </li>
                        <li class="flex-column justify-content-end align-items-end couponDiscount">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="left">
                                    <h6>Coupon Discount :</h6>
                                </div>
                                <div class="right">
                                    <h6 class="tableData">AED 15760.00</h6>
                                    <h6 class="tableData">- AED 50</h6>
                                </div>
                            </div>
                            <a class="coupon_remove_btn" href="javascript:void(0)" >Remove Coupon<i class="fa-solid fa-xmark"></i></a>
                        </li>
                    </ul>
                    <div class="sub_total">
                        <div class="sub_left">
                            <h6>Total</h6>
                        </div>
                        <div class="sub_right">
                            <h5>AED 15710.00</h5>
                        </div>
                    </div>

                    <div class="banks">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <input class="bank-radio" type="radio" checked id="credit" name="bank">
                                        <label for="credit"><img src="assets/images/mastercard.svg" alt=""></label>
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Pay with Credit card or Debit card.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <input class="bank-radio" type="radio" id="paypal" name="bank">
                                        <label for="paypal"><img src="assets/images/paypal.svg" alt=""></label>
                                    </button>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Pay with PayPal.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <input class="bank-radio" type="radio" id="applepay" name="bank">
                                        <label for="applepay"><img src="assets/images/applepay.svg" alt=""></label>
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Pay with Apple Pay.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <input class="bank-radio" type="radio" id="bitcoin" name="bank">
                                        <label for="bitcoin"><img src="assets/images/bitcoin.svg" alt=""></label>
                                    </button>
                                </h3>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Pay with Bitcoin.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <input class="bank-radio" type="radio" id="cod" name="bank">
                                        <label for="cod"><img src="assets/images/cashondelivery.svg" alt=""></label>
                                    </button>
                                </h3>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Pay with Cash On Delivery.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btnsBox">
                        <a href="thankyou.php" class="primary_btn login">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('assets/includes/footer.php') ?>
