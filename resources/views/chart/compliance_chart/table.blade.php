<h3>Compliance Report for {{ $version->standard->name }} - Version : {{ $version->name }}</h3>
<table class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>Clause</th>
        <th>Compliant</th>
        <th>Not Compliant</th>
        <th>Under Process</th>
        <th>Not Evaluated</th>
    </tr>
    </thead>
    <tbody>
    @php
        $tYes = 0;
        $tNo = 0;
        $tUp = 0;
        $tNe = 0;
    @endphp
    @foreach($clauses as $clause)
        @if(!$clause->notShow)
            <tr>
                <td><a href="javascript:void(0)"
                       onclick="renderComplianceChart('{{ $clause->id }}')">{{ $clause->number }}</a>
                </td>
                <td>
                    @php($yes =getPercent($clause['clauseNumbers']['Yes'],$clause->totalNumber) )
                    @php($tYes += $yes)
                    {{ $yes }}%
                </td>
                <td>
                    @php($no =getPercent($clause['clauseNumbers']['No'],$clause->totalNumber) )
                    @php($tNo += $no)
                    {{ $no }}%
                </td>
                <td>
                    @php($up =getPercent($clause['clauseNumbers']['Under Process'],$clause->totalNumber) )
                    @php($tUp += $up)
                    {{ $up }}%
                </td>
                <td>
                    @php($ne =getPercent($clause['clauseNumbers']['Not Evaluated'],$clause->totalNumber) )
                    @php($tNe += $ne)
                    {{ $ne }}%
                </td>
            </tr>
        @endif
    @endforeach
    <tr>
        <td>Total</td>
        <td>{{ divideNumber($tYes , $totalClauses) }}</td>
        <td>{{ divideNumber($tNo , $totalClauses) }}</td>
        <td>{{ divideNumber($tUp , $totalClauses) }}</td>
        <td>{{ divideNumber($tNe , $totalClauses) }}</td>
    </tr>
    </tbody>
</table>
