@extends('admin.layout')

@section('title', 'creat_skill')

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
                                <li class="breadcrumb-item"><a href="javascript:">Add skill</a></li>
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
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Project Name" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Title</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Project Title" value="{{ old('title') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">URL of Project</label>
                                                <input type="text" name="src" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Link" value="{{ old('src') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image(png) :</label>
                                                <input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" id="image" class="form-control" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                    <div class="col-md-4">
                                        <img id="output" style="margin-top: 5%" src="" width="65%" height="80%">
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
