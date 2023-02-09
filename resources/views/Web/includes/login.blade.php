<div class="modal fade login_create" id="bulk_order_form_pop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-list"></i> Bulk Enquiry</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid"  src="{{ asset('frontend/images/colse_login.svg')}}" alt=""></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name*">
                            <span class="invalidMessage"> Given Data Error </span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <textarea name="" class="form-control form-message" placeholder="Message*"></textarea>
                            <!-- <input type="password" class="form-control" placeholder="Password*"> -->
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>