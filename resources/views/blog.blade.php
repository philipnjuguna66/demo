@extends('layouts.app')
@section('title','My bLogs')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @foreach($blogs as $blog)
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{$blog->subject}}</div>

                    <div class="card-body">
                        {{$blog->message}}

                        {{--<table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Article</th>
                                <th>Published</th>
                                <th>Owner</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$blog->subject}}</td>
                                    <td>{{$blog->message}}</td>
                                    <td>{{$blog->created_at->diffForHumans()}}</td>
                                    <td>{{$blog->user->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>--}}
                        </table>
                    </div>
                </div>
            </div>

            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
                <div class="clearfix"></div>
            @endforeach
        </div>
    </div>

@endsection