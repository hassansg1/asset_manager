@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
{{--    @include('layouts.top_heading',['heading' => $heading."s"])--}}
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom_table_div">
                            <table id="datatable-logs"
                                   class="table table-borderless dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @foreach(getNotifications() as $key => $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$item->heading}}</td>
                                        <td>{{$item->message}}</td>
                                        @php
                                            $day1 = $item->created_at;
                                            $day1 = strtotime($day1);
                                            $day2 =  date("Y-m-d h:i:sa");
                                            $day2 = strtotime($day2);

                                            $diffHours = round(($day2 - $day1) / 3600*60*60);
                                            $d1 = date_create('@' . (($day2 = time()) + $diffHours))->diff(date_create('@' . $day2));

                                            $dateTime ="";
                                            // $d3 = $d1->format('%a days %h hours %i minutes');


                                            if($d1->format('%a') == '0'  && $d1->format('%h') == '0' && $d1->format('%i') == '0')
                                            {
                                                $dateTime = "Now";
                                            }
                                            elseif($d1->format('%a') == '0' && $d1->format('%h') <= '0' && $d1->format('%h') <= '24' && $d1->format('%i') > '0')
                                            {
                                                $dateTime = $d1->format('%i min');
                                            }
                                            elseif($d1->format('%a') == '0' && $d1->format('%h') > '0' && $d1->format('%h') < '24' )
                                            {
                                                $dateTime = $d1->format('Today %h hours ago');
                                            }
                                            elseif($d1->format('%a') > '0' && $d1->format('%a') <= '1' )
                                            {
                                                $dateTime =  "Yesterday";
                                            }
                                            else
                                            {
                                                $dateTime =  date('d ,M Y',strtotime($notification->created_at));
                                            }

                                        @endphp

                                        <td>{{$dateTime}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        $('#datatable-logs').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            "searching": false,
            "ordering": false,
            "bPaginate": false,
            "bSortable": false,
        });
    </script>
@endsection
