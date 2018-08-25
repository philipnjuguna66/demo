@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                        @if (session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form class="form-horizontal" method="post" action="{{route('blog_store')}}">

                        {{csrf_field()}}

                        <div class="form-group">

                            <label class="col-md-2">Subject</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject">

                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2">Message</label>
                            <div class="col-md-12">
                               <textarea name="message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" cols="10" rows="10"></textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
