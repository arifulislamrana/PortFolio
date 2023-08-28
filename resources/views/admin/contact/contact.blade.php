@extends('admin.layout')

@section('title', 'contact')

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
                                <li class="breadcrumb-item"><a href="javascript:">contact</a></li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h5>Admin Info.</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <h4 class="form-control" id="exampleInputEmail1">{{ $contact->name }}</h4>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <h4 class="form-control" id="exampleInputEmail1">{{ $contact->email }}</h4>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject</label>
                                                <h4 class="form-control" id="exampleInputEmail1">{{ $contact->subject }}</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Message</label>
                                                <h4 class="form-control" id="exampleInputEmail1">{{ $contact->message }}</h4>
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
