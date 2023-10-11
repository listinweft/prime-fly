<div class="form-row" id="append_result_{{$primary_key}}">
    <div class="form-group col-md-4">
        <label for="inputPassword4">Title*</label>
        <input type="text" class="form-control required" maxlength="230" name="extra_title[]"
               id="extra_title_{{$primary_key}}" placeholder="Title">
        <div class="help-block with-errors" id="extra_title_{{$primary_key}}_error"></div>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Value*</label>
        <input type="text" class="form-control required" maxlength="230" name="extra_value[]"
               id="extra_value_{{$primary_key}}" placeholder="Value">
        <div class="help-block with-errors" id="extra_value_{{$primary_key}}_error"></div>
    </div>
    <div class="form-group col-md-1">
        <label for="sort_order_{{$primary_key}}">Sort Order</label>
        <input type="number" class="form-control" name="sort_order[]"
               id="sort_order_{{$primary_key}}" value="{{ $primary_key }}">
    </div>
        <div class="form-group col-md-1" style="margin-top: 10px">
        <a href="javascript:void(0);" class="btn btn-success mt-4 add_specification_row btn-sm add_{{$primary_key}}"
           id="{{$primary_key}}"><i class="fa fa-plus fa-lg"></i></a>
        <a href="javascript:void(0);" class="btn btn-danger mt-4 remove_specification_row btn-sm" id="{{$primary_key}}"
           ref="0"><i class="fa fa-times fa-lg"></i></a>
        <input type="hidden" name="detail_id[]" id="detail_id_{{$primary_key}}" value="0">
    </div>
</div>
