@extends('admin.layout')

@section('title', 'about')

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
                                <li class="breadcrumb-item"><a href="javascript:">About</a></li>
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
                                    <h5>Update Info.</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('abouts.update', ['about' => $data->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ $data->name }}" id="exampleInputEmail1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input class="form-control" type="email" name="email"
                                                        value="{{ $data->email }}" id="exampleInputEmail1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input class="form-control" type="tel" name="phone"
                                                        value="{{ $data->phone }}" id="exampleInputEmail1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Zip</label>
                                                    <input class="form-control" type="text" name="zip"
                                                        value="{{ $data->zip }}" id="exampleInputEmail1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input class="form-control" type="text" name="address"
                                                        value="{{ $data->address }}" id="exampleInputEmail1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date of Birth</label>
                                                    <input class="form-control" type="date" name="dob"
                                                        value="{{ $data->dob }}" id="exampleInputEmail1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="image">Image(png) :</label>
                                                    <input name="image" type="file" accept="image/*"
                                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                                        id="image" class="form-control">
                                                </div>
                                                <img id="output" src="{{ $data->image }}"
                                                    width="40%" height="50%"></td>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Update</button>
                                    </form>
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
