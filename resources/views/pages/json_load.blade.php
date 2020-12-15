@extends('layouts.base')


@section('content')

<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <div class="card border-primary">
            <div class="card-header text-center bg-primary text-white">
                <h4>Input Json file to Fill database Automatically</h4>
            </div><!--.card-header-->
            <div class="card-body">
                    <form action="/store" method="POST" class="form mt-4" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">

                                <div class="input-group mb-3">

                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose Json file</label>
                                    </div><!--custom-file-->

                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text btn btn-info">Upload</button>
                                    </div>

                                </div><!--input-group-->
                            </div><!--form-group-->
                    </form><!--form-->
            </div><!--.card-body-->
        </div><!--.card-->
    </div><!--col-md-6-->
</div><!--.row-->

@endsection