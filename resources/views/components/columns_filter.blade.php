<br>
<div class="">
    <fieldset>
        <legend>Search</legend>
        <form action="" id="column_search_form">
            <div class="search_div_sl">
                @if(isset($request->where) && is_array($request->where))
                    @for($index = 0;$index<count($request->where);$index++)
                        @include('components.columns_filter_row',['index' => $index])
                    @endfor
                @else
                    @include('components.columns_filter_row')
                @endif
            </div>
        </form>
        <button onclick="getNewRowForFilter()" title="Add New" type="button"
                class="btn btn-primary btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fas fa-plus-circle">
                New
            </i>
        </button>
        <button onclick="loadTableData('{{ $data['request']['url'] ?? '' }}','{{ $route }}')" title="Add New"
                type="button"
                class="btn btn-primary btn-filter dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fas fa-search">
                Search
            </i>
        </button>
    </fieldset>
</div>