<div class="card">
    <div class="card-body">
        <h4 class="card-heading">
            Loyalty Points
        </h4>
        <br>
        <div class="row">
            <div class="col-xl-2">
                <label for="points" class="form-label">Balance</label>
                <input name="loyalty_points" data-toggle="touchspin"
                       id="loyalty_points_input"
                       type="text"
                       value="{{ isset($item) ? $item->loyalty_points_balance  : 0  }}">
            </div>
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <label for="comments_loyalty" class="form-label">Comment</label>
                <input type="text" value=""
                       class="form-control" id="comments_loyalty"
                       name="comments_loyalty">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12" id="loyalty_points_table">
                @include('client.partials.loyalty_points_table',['items' => $item->loyaltyLog])
            </div>
        </div>
    </div>
</div>
<div style="text-align: right">
    <button type="button" onclick="addLoyaltyPoints()" class="btn btn-primary w-md submit_form">Save</button>
</div>
@section('script')
    @include('client.scripts.loyalty_point_script')
@endsection
