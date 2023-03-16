@inject('userVoucher', 'App\Models\userVoucher')
<div class="row">
    @foreach ($vouchers as $item)
    <div class="col-lg-4">
        <div class="item-game-wrapper">
            <div class="item-info">
                <img id="img-preview" src="{{ asset('Img/voucher-img/'.$item->image) }}" style="width: 100%">
                @php
                $voucherUser=$userVoucher::where('voucher_id','=',$item->id)->where('user_id','=',Auth::user()->id)->where('status',1)->select('voucher_id')->first()
                @endphp
                @if (!empty($voucherUser))
                <a class="item-btn-disable" style="margin-top: 10px">
                    Owned
                </a>
                @elseif (Auth::user()->userRelation->point<$item->point)
                    <a class="item-btn-disable" style="margin-top: 10px" >
                        <span>Not enough point</span>
                    </a>
                    @else
                    <a class="item-btn" style="margin-top: 10px" onclick="addVoucher({{ $item->id }})">
                        <img src="{{ asset('Img/coint.jpg') }}" alt="" style="width: 20%;height:20%"> {{ $item->point }}
                    </a>
                    @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
