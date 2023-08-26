@extends('admin.layout')

@section('title', 'sliders')

@section('styles')
@endsection

@section('content')

<div class="pcoded-wrapper">
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
                                <li class="breadcrumb-item"><a href="javascript:">Sliders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session()->get('message') }}
            </div>
            @endif
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">


                        <!--[ active category ] start-->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Home Sliders</h5>
                                    <form style="float: right" method="GET" action="{{ route('homes.index') }}" id="search-form" class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="text" id="search-text" name="search" placeholder="designation" aria-label="Search" required>
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        @if(!empty($sliders) && $sliders->count())
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Designation</th>
                                                    <th>Intro</th>
                                                    <th>Last Update</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < count($sliders); $i++)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $sliders[$i]->designation }}</td>
                                                    <td>{{ $sliders[$i]->intro}}</td>
                                                    <td>{{ $sliders[$i]->updated_at}}</td>
                                                    @if ($sliders[$i]->image != null)
                                                    <td><img style="height: 40px; width: 45px; border-radius: 50%" src="{{$sliders[$i]->image}}" alt="null"></td>
                                                    @else
                                                    <td><img style="height: 40px; width: 45px; border-radius: 50%" src="/themes/admin/assets/images/slider/img-slide-1.jpg" alt=""></td>
                                                    @endif
                                                    <td>
                                                        <a class="btn btn-rounded btn-primary" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-rounded btn-info" href="{{ route('homes.edit', ['home' => $sliders[$i]->id]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-rounded btn-danger" onclick="showModal({{$sliders[$i]->id}})" data-toggle="modal" href="#">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                        <div class="float-right">
                                            {{ $sliders->links('pagination::bootstrap-4') }}
                                        </div>
                                        @else
                                            <h4 style="text-align: center">No Sliders Exists</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!--[ category ] end-->

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

<form id="delForm" method="POST" class="remove-record-model">
    @csrf
    {{ method_field('delete') }}
    <div class="modal modal-danger fade" id="modal-danger" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Alert</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Delete This Slider?!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-warning" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-rounded btn-danger float-right">Delete</button>
                    </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>
@endsection

@section('scripts')
<script>
    function showModal(id) {
      $("#delForm").attr('action', 'homes/' + id);
      $(`#modal-danger`).modal('show');
    }

    var input = document.getElementById("search-text");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const form = document.getElementById(`search-form`);
            form.submit();
        }
    });
</script>
@endsection
