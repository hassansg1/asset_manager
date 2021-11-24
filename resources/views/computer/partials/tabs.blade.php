<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#basic_info" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">Basic Info</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#ports" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">Ports</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#other_info" role="tab">
            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
            <span class="d-none d-sm-block">Other Info</span>
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content p-3 text-muted">
    <div class="tab-pane active" id="basic_info" role="tabpanel">
        @include('assets_shared.basic_info')
    </div>
    <div class="tab-pane" id="ports" role="tabpanel">
        @include('computer.partials.tabs.ip_address')
    </div>
    <div class="tab-pane" id="other_info" role="tabpanel">
        @include('computer.partials.tabs.other_info')
    </div>
</div>
