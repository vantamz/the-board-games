@if(($userRedeemCode->count()>0))
<div class="row">
    <div class="col-12 mb-5">
        <h2 class="mt-2">Voucher list</h2>
        <div class="card border-0 myorder-wrapper mt-4 p-3">
            <div class="row">
                @foreach ($userRedeemCode as $item)
                <div class="col-lg-4">
                    <div class="item-game-wrapper">
                        <div class="item-info">
                            <img id="img-preview" src="{{ asset('Img/voucher-img/'.$item->voucher->image) }}" style="width: 100%">
                            @if (Session::get('Cart')->totalPrice+$tax+$ship > $item->voucher->price)
                            <button class="item-btn add_voucher" id="{{$item->voucher->id}}" name="" value="{{$item->voucher->price}}" style="margin-top: 10px" href="#">
                                 Apply 
                            </button>
                            @else
                            <button class="item-btn-disable" style="margin-top: 10px">Apply</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
<div style="text-align:center">
<h3>
    You don't have any redeem code
    </h3>
</div>
@endif