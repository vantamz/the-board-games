<div id="review_list">
    <div class="row">
        <div class="col-lg-6">
            <div class="box_rating">
                <h5>
                    Overrall
                </h5>
                <div class="d-flex justify-content-center">
                    <h4>
                        @php
                        $point=0;
                        $count=0;
                        @endphp
                            <div hidden>
                            @foreach ($rate as $item)
                            {{ $count++ }}
                            {{ $point+=$item->rate }}
                            @endforeach
                        </div>
                        @if($count!=0)
                        {{ number_format($point/$count, 2) }}
                        @else
                        0.0
                        @endif
                    </h4>
                    <span class="far fa-star"></span>
                </div>
            </div>
        </div>
        <div class="p-t-20">
            @if ($comments!=null)
            @foreach ($comments as $comment)
            <div class="review_item">
                <div class="media">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="@php
            if($comment->role_user==3)
            echo asset('Img/customer-avatar/'.$comment->customerRelation->avatar);
            elseif($comment->role_user==1||$comment->role_user==2)
            echo asset('Img/user-img/'.$comment->staffRelation->avatar);
            else
            echo asset('Img/unsigned.png');
        @endphp" alt="" class="comment_radius">
                        </div>
                        <div class="col-lg-11">
                            <div class="review_body">
                                <h4>{{ $comment->userRelation->name }}</h4>
                                <span>
                                    @if ($comment->RatingRelation!=null)
                                    {{ $comment->RatingRelation->rate }}
                                    @else
                                    0
                                    @endif
                                </span>point
                            </div>
                        </div>
                    </div>
                </div>
                <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
