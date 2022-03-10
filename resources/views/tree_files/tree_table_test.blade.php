@foreach (\App\Models\Company::all() as $company)
    @php($companyClass = 'loc'.$company->id)
    @include('tree_files.location_tree_row',['location' => $company,'spaces'=>0,'class'=>$companyClass])

    @foreach (\App\Models\Unit::where('parent_id',$company->id)->get() as $unit)
        @php($unitClass = $companyClass.' loc'.$unit->id)
        @include('tree_files.location_tree_row',['location' => $unit,'spaces'=>5,'class'=>$unitClass])

        @foreach (\App\Models\Site::where('parent_id',$unit->id)->get() as $site)
            @php($siteClass = $companyClass.' '.$unitClass.' loc'.$unit->id)
            @include('tree_files.location_tree_row',['location' => $site,'spaces'=>10,'class'=>$siteClass])
        @endforeach
    @endforeach
@endforeach
