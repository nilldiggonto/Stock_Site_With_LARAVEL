
@extends('layouts.base')


@section('content')
<!--HEading -->
<div class="card border-primary mt-2">

<div class="card-header bg-primary">
   
    <form action="/filter" class="d-inline" method="GET">
    <div class="form-row">

        <div class="col-md-8">
            <select name="filter" class="form-control" id="exampleSelect1">
                @foreach($full_list->unique('trade_code') as $list)
                <option  value="{{$list->trade_code}}">{{$list->trade_code}}</option>
                @endforeach
            </select>
        </div><!--col-md8-->

        <div class="col">
            <input type="submit" class="form-control btn btn-dark" value="Show Chart">
        </div><!--col-->
    </div><!--form-row-->
    </form>
</div> <!--card-header-->

    @if(count($full_list)>0)
        <div class="card-body">
            <canvas id="lineChart"></canvas><!--Chart-->
        </div><!--card-body-->
    @else
        <div class="card-footer text-center bg-warning text-white">
            <h4>No Entry Available. Add one</h4>
        </div><!--card-footer-->
    @endif
</div><!--card-->
<!--HEading-->


<!-- ############ DATA ADD & TABLE AREA ############-->
<div class="card border-dark mt-2">
    <!-- <div class="card-header text-center bg-primary text-white">
        <h4>Add New Entry</h4>
    </div> -->

    <!-- ##### Enter New Entry ##### -->
    <div class="card-body bg-dark">
                <form method="POST" action="/stocks">
                @csrf
                    <div class="form-row">

                        <div  class="col md-form md-outline input-with-post-icon datepicker">
                        <input
                        id="datepicker" required width="276" name='date' placeholder="Select date" type="text" id="example" class="form-control">
                        </div> <!--col-->

                        <div class="col">
                        <input type="text"  required class="form-control" placeholder="Trade Code" name="trade_code">
                        </div><!--col-->

                        <div class="col">
                        <input type="number" required step=any class="form-control" placeholder="High" name="high">
                        </div><!--col-->

                        <div class="col">
                        <input type="number"  required step=any class="form-control" placeholder="Low" name="low">
                        </div><!--col-->

                        <div class="col">
                        <input type="number" required step=any class="form-control" placeholder="Open" name="open">
                        </div><!--col-->

                        <div class="col">
                        <input type="number" required step=any class="form-control" placeholder="Close" name="close">
                        </div><!--col-->

                        <div class="col">
                        <input type="number" required  step=any class="form-control" placeholder="Volume" name="volume">
                        </div><!--col-->

                        <div class="col">
                            <input type="submit" class="form-control btn btn-sm btn-primary" value="Add">
                        </div><!--col-->
                    </div><!--.form-row-->
            </form><!--form-->
    </div><!--.card-body-->
</div><!--.card-->




<!-- ########### DATA TABLE ############### -->
<table class="table table-hover">

  <thead class="bg-primary text-white text-center">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Trading Code</th>
      <th scope="col">High</th>
      <th scope="col">Low</th>
      <th scope="col">Open</th>
      <th scope="col">Close</th>
      <th scope="col">Volume</th>
      <th  scope="col">Action</th>
      
    </tr>
  </thead>

  <tbody>
  @foreach($data_list as $d)
  <tr class="table-dark text-center">
      <th scope="row">{{ $d->date }}</th>
      <td>{{ $d->trade_code }}</td>
      <td> {{ $d->high }}</td>
      <td>{{ $d->low }}</td>
      <td>{{ $d->open }}</td>
      <td>{{ $d->close }}</td>
      <td>{{ $d->volume }}</td>
     
      <td>
        <a href="/stocks/{{$d->id}}/edit" class="btn btn-sm btn-primary">Edit</a>

        <form class="d-inline" method="post" action="{{ route('stocks.destroy', $d->id)}}">
                
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-warning">Delete</button>
        </form>
      </td>
      
      
    </tr>
  @endforeach
  </tbody>

  </table>


        <!-- ############# PAGINATION AREA ############## -->
            <div class="mt-2 text-center">
                @if($data_list instanceof \Illuminate\Pagination\LengthAwarePaginator )

                {{$data_list->links()}}

                @endif
            
            </div>


           

@endsection

    


@push('scripts')
<!-- CHART -->
   <script>

        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
        labels: 
               [ @foreach($month_json as $month) '{{$month['date']}}',  @endforeach],
           
            // ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
        label: "High",
        data:[ @foreach($month_json as $month) '{{$month['high']}}',  @endforeach ], 
        // [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
        'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
        },


        {
        label: "Low",
        data: [@foreach($month_json as $month) '{{$month['low']}}',  @endforeach],
        backgroundColor: [
        'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
        'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
        },


        {
        label: "Open",
        data: [@foreach($month_json as $month) '{{$month['open']}}',  @endforeach],
        backgroundColor: [
        'rgb(0, 51, 153,.2)',
        ],
        borderColor: [
        'rgb(0, 51, 153,.7))',
        ],
        borderWidth: 2
        },


        {
        label: "Close",
        data: [@foreach($month_json as $month) '{{$month['close']}}',  @endforeach],
        backgroundColor: [
        'rgba(0, 153, 51, .2)',
        ],
        borderColor: [
        'rgba(0, 153, 51, .7)',
        ],
        borderWidth: 2
        }




        ]
        },
        options: {
        responsive: true
        }
        });

    </script>
@endpush