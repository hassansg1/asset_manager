@include('components.breadcrumb',['items' => getAncestorsForLocation(Session::get('asset_location_id')),'heading' => 'Asset Navigation'])
<button class="btn btn-primary mr-10">
    <a style="color: white"
       href="{{ url('assets/computer') }}">
        Computer
        Assets</a>
</button>
<button class="btn btn-primary mr-10">
    <a style="color: white"
       href="{{ url('assets/network') }}">
        Network
        Assets</a>
</button>
<button class="btn btn-primary mr-10">
    <a style="color: white"
       href="{{ url('assets/l_one') }}">
        L01
        Assets</a>
</button>
<br>
