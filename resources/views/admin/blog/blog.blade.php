@extends('admin.layout')

@section('title', 'blog')

@section('styles')
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Home</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:">blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>blog Info.</h5>
                                    <a style="float: right"
                                        href="{{ route('blogs.edit', ['blog' => $blog->id]) }}"><button
                                            class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button></a>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Blog TItle</label>
                                                <h4 class="form-control" id="exampleInputEmail1">{{ $blog->title }}
                                                </h4>
                                            </div>
                                            <div class="form-group">
                                                <img id="output" style="margin-top: 0%" src="{{ $blog->image }}" width="100%" height="80%">
                                            </div>
                                            <div class="form-group">
                                                <h4 class="form-control" id="exampleInputEmail1">{!! $blog->body !!}</h4>
                                            </div>
                                            <div class="form-group">
                                                <p>Posted on: {{ $blog->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection
