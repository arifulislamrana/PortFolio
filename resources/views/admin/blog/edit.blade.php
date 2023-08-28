@extends('admin.layout')

@section('title', 'edit_blog')

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
                                <li class="breadcrumb-item"><a href="javascript:">Update blog</a></li>
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
                        <div class="col-md-8">
                            <form action="{{Route('blogs.update', ['blog' => $blog->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" class="form-control" value="{{ $blog->title }}" placeholder="Title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail Image</label>
                                    <input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" id="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" >Post Body</label>
                                    <textarea class="form-control tinymce-editor" name="body" id="exampleFormControlTextarea1" rows="3">{{html_entity_decode($blog->body)}}</textarea>
                                </div>
                                {{-- <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <img id="output" style="margin-top: 7%" src="{{$blog->image}}" width="100%" height="80%">
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/2v1c7jjb931y7wiy2as5ket8cl5sxkgoc1tzzlwzoq2ga9zi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
     ],
     toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    height: 300,
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>

@endsection
