@extends('admin.layout')

@section('title', 'creat_resume')

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:">Add Resume</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($errors) > 0 )
              <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
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
                            <div class="card-body">
                                <form action="{{ route('resumes.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name of Degree</label>
                                                <input class="form-control" type="text" name="degree_name"
                                                    value="{{ old('degree_name') }}" id="exampleInputEmail1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name of Institute</label>
                                                <input class="form-control" type="text" name="institute"
                                                    value="{{ old('institute') }}" id="exampleInputEmail1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Web URL of Institute</label>
                                                <input class="form-control" type="text" name="institute_src"
                                                    value="{{ old('institute_src') }}" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Describe This Degree</label>
                                                <input class="form-control" type="text" name="description"
                                                    value="{{ old('description') }}" id="exampleInputEmail1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Starting Date</label>
                                                <input class="form-control" type="date" name="starting"
                                                    value="{{ old('starting') }}" id="exampleInputEmail1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ending Date</label>
                                                <input class="form-control" type="date" name="ending"
                                                    value="{{ old('ending') }}" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection
