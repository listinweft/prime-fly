<form method="post" id="addAddressForm">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" value="{{ @$customerAddress->first_name }}" name="first_name" id="first_name"
                       class="form-control required" placeholder="First Name*" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" value="{{ @$customerAddress->last_name }}" name="last_name" id="last_name"
                       class="form-control required" placeholder="Last Name*" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="email" value="{{ @$customerAddress->email }}" name="email" id="email"
                       class="form-control required" placeholder="Email*" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="number" value="{{ @$customerAddress->phone }}" name="phone" id="phone"
                       class="form-control required" placeholder="Phone Number*" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group address_label">
                <label class="label_cnt">
                    <span>Address Type</span>
                </label>
                <div class="d-flex">
                    <div class="form-check">
                        <input class="form-check-input"
                               {{ !isset($customerAddress) ? 'checked' : '' }} {{ @$customerAddress->address_type == 'Home' ? 'checked' : '' }} type="radio"
                               name="address_label_type" id="address_label_type" value="Home">
                        <label class="form-check-label" for="address_label_type">
                            Home
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                               {{ @$customerAddress->address_type == 'Work' ? 'checked' : '' }} type="radio"
                               name="address_label_type" id="address_label_type" value="Work">
                        <label class="form-check-label" for="address_label_type">
                            Work
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="number" value="{{ @$customerAddress->zipcode }}" maxlength="15" name="zipcode" id="zipcode"
                       class="form-control " placeholder="Zip Code" >
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <select name="country" id="country" class="form-control form_select required" required>
                    <option value="">Select Country*</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}"
                            {{(@$customerAddress->state->country_id==$country->id)?'selected':''}}>
                            {{$country->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <select name="state" id="state" class="form-control form_select required" required>
                    <option value="">Select Emirate*</option>
                    @if(!empty($states))
                        @foreach($states as $state)
                            <option value="{{ $state->id }}"
                                {{(@$customerAddress->state_id==$state->id)?'selected':''}}
                            >{{$state->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <textarea class="form-control form-message required" name="address" id="address"
                          placeholder="Address*" required>{{ @$customerAddress->address }}</textarea>
            </div>
        </div>
        <input type="hidden" id="id" name="id" value="{{@$customerAddress->id??0}}">
        <input type="hidden" name="set_session" id="set_session" value="0">
        <input type="hidden" name="show_page" id="show_page" value="1">
        <input type="hidden" id="account_type" name="account_type"  value="{{(Auth::guard('customer')->check())?1:0}}">
        <input type="hidden" name="is_default" id="is_default" value="0">
        <div class="col-12 d-flex flex-column flex-sm-row mt-3">
            <a href="javascript:void(0)" class="secondary_btn " id="add_address_go">Cancel</a>
            <div class="form-group mb-0">
                <button class="btn primary_btn form_submit_btn" data-url="/customer/update-customer-address">Save
                </button>
            </div>
        </div>
    </div>
</form>