@extends('layouts.base')


@section('content')

<div class="card mt-4 border-primary">
    <div class="card-header text-center bg-primary text-white">
        <h4>Update Entry</h4>
    </div><!--card-header-->

    <div class="card-body">
                <form method="POST" action="/og/{{$edit->id}}">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="form-row">

                <div  class="col md-form md-outline input-with-post-icon datepicker">
                <input value="{{$edit->date}}"
                id="datepicker" width="276" name='date' placeholder="Select date" type="text" id="example" class="form-control">
                </div> <!--col-->

                <div class="col">
                <input value="{{$edit->trade_code}}" type="text"  class="form-control" placeholder="Trade Code" name="trade_code">
                </div><!--col-->

                <div class="col">
                <input value="{{$edit->high}}" type="number" class="form-control" placeholder="High" name="high">
                </div><!--col-->

                <div class="col">
                <input value="{{$edit->low}}" type="number" class="form-control" placeholder="Low" name="low">
                </div><!--col-->

                <div class="col">
                <input value="{{$edit->open}}" type="number" class="form-control" placeholder="Open" name="open">
                </div>

                <div class="col">
                <input value="{{$edit->close}}" type="number" class="form-control" placeholder="Close" name="close">
                </div><!--col-->

                <div class="col">
                <input value="{{$edit->volume}}" required type="number" class="form-control" placeholder="Volume" name="volume">
                </div><!--col-->

                <div class="col">
                    <input type="submit" class="form-control btn btn-sm btn-primary" value="Update">
                </div><!--col-->

            </div><!--.form-row-->
            </form>
    </div><!--.card-body-->
</div><!--.card-->

@endsection