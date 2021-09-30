<div class="row">

    <div class="table-responsive">
        <table class="table mb-0">

            <thead>
            <tr>
                <th>Location</th>
                <th>Hierarchy</th>
                <th>Computer Asset</th>
                <th>L01 Asset</th>
                <th>Network Asset</th>
            </tr>
            </thead>
            <tbody>
            @include('components.tree',['file' => 'tree_table'])
            </tbody>
        </table>
    </div>
</div>
