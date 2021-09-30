<div class="card">
    <div class="card-body">
        <div class="tab-content p-3 text-muted">
            <div class="tab-pane" id="personal_info" role="tabpanel">
                @include('user.navs.tab_content.personal_info')
            </div>
            <div class="tab-pane active" id="location_info" role="tabpanel">
                @include('user.navs.tab_content.location')
            </div>
        </div>
    </div>
</div>
