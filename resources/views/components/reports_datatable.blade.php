@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
    @include('layouts.top_heading',['heading' => $heading])
    @yield('top_content_secondary')
    @include('components.reports_datatable_components')
@endsection
