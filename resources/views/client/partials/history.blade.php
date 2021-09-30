<div class="row">
    <div class="col-xl-12">
        <div class="row">
            @include('client.partials.history_tab.tabs')
            <div class="col-md-10">
                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                    @include('client.partials.history_tab.visit_summary')
                    <div class="tab-pane fade" id="v-pills-upcoming-appts" role="tabpanel"
                         aria-labelledby="v-pills-upcoming-appts-appts">
                        @include('client.partials.history_tab.table')
                    </div>
                    <div class="tab-pane fade" id="v-pills-previous-services" role="tabpanel"
                         aria-labelledby="v-pills-previous-services-tab">
                        @include('client.partials.history_tab.table')
                    </div>
                    <div class="tab-pane fade" id="v-pills-purchased-products" role="tabpanel"
                         aria-labelledby="v-pills-purchased-products-tab">
                        @include('client.partials.history_tab.table')
                    </div>
                    <div class="tab-pane fade" id="v-pills-cancelled-appts" role="tabpanel"
                         aria-labelledby="v-pills-cancelled-appts-tab">
                        @include('client.partials.history_tab.table')
                    </div>
                    <div class="tab-pane fade" id="v-pills-other-purchases" role="tabpanel"
                         aria-labelledby="v-pills-other-purchases-tab">
                        @include('client.partials.history_tab.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
