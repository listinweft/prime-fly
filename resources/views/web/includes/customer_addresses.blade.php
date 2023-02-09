<a class="btn secondary_btn" id="add_address_go"><i class="fa-solid fa-plus"></i>Add Address</a>

<div class="address_wrapper">
@if($customerAddresses->isNotEmpty())
@foreach($customerAddresses as $address)
@if(isset($address->state))
    @php $shipping = App\Models\ShippingCharge::active()->where('state_id' ,$address->state->id)->first();
    @endphp
    @else
    @php $shipping = ''; @endphp
@endif
    <div class="address_box {{ $address->is_default == 'Yes' ? 'set_default' : '' }}">
        @if($address->is_default == 'Yes')
            <div class="default_icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        @endif
        <h6 class="ads_name">
            {{ $address->first_name .' '.$address->last_name }}
        </h6>
        <ul>
            <li>
                <p>
                    {{ $address->address_type }}
                </p>
            </li>
            <li class="add_line">
                <p>
                    {!! $address->address !!}
                </p>
            </li>
            <li>
                <p>
                    Email : {{ $address->email }}
                </p>
            </li>
            <li>
                <p>
                    Phone Number : {{ $address->phone }}
                </p>
            </li>
            @if ($address->state)
            <li>
                <p>State : {{ $address->state->title }}</p>
            </li>
            @endif
            <li>
                <p>Country
                    :  {{$address->country->title}}</p>
            </li> 
        </ul>
        <div class="buttons_area">
            <a class="address-form"
               data-id="{{ $address->id }}"
               href="javascript:void(0)"><i
                    class="fa-solid fa-pen-to-square"></i> Edit</a>
            <a class="remove_add remove-address"
               data-id="{{ $address->id }}"
               href="javascript:void(0)"><i
                    class="fa-solid fa-trash-can"></i>
                Remove</a>
            @if( $address->is_default == 'No')
                <a class="set_d_add default_address" href="javascript:void(0)" data-id="{{$address->id}}"><i
                        class="fa-solid fa-circle-check"></i>
                    Set as Default</a>
            @endif
        </div>
    </div>
@endforeach
@endif
</div>
