<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#basic_info" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">Basic Info</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#basic_info" role="tab">
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
    <div class="tab-pane" id="basic_info" role="tabpanel">
        @include('assets_shared.basic_info')
    </div>
    <div class="tab-pane active" id="basic_info" role="tabpanel">
        @include('computer.partials.tabs.ip_address')
    </div>
    <div class="tab-pane" id="other_info" role="tabpanel">
        @include('computer.partials.tabs.other_info')
    </div>
    <div class="tab-pane" id="messages1" role="tabpanel">
        <p class="mb-0">
            Etsy mixtape wayfarers, ethical wes anderson tofu before they
            sold out mcsweeney's organic lomo retro fanny pack lo-fi
            farm-to-table readymade. Messenger bag gentrify pitchfork
            tattooed craft beer, iphone skateboard locavore carles etsy
            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
            mi whatever gluten-free carles.
        </p>
    </div>
    <div class="tab-pane" id="settings1" role="tabpanel">
        <p class="mb-0">
            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten-free squid
            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
            art party locavore wolf cliche high life echo park Austin. Cred
            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
            farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
            mustache readymade keffiyeh craft.
        </p>
    </div>
</div>
