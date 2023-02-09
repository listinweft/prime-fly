<div class="modal fade login_create" id="enquire_now_form_pop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-list"></i>Enquiry</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid" src="{{asset('frontend/images/svg/colse_login.svg')}}"  alt=""></button>
            </div>
            <div class="modal-body">
                <form action="" id="enquireNowForm" name="enquireNowForm">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="product_name" id="product_title" class="form-control" placeholder="Product Name*" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject*">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control form-message" placeholder="Message*"></textarea>
                            <!-- <input type="password" class="form-control" placeholder="Password*"> -->
                        </div>
                        <input type="hidden" id="type" name="type" value="product">
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <div class="form-group">
                            <button class="btn primary_btn form_submit_btn" data-url="/enquiry">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
