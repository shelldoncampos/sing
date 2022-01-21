@php
    $html_tag_data = ["scrollspy"=>"true"];
    $title = 'Dropzone';
    $description= 'An open source library that provides drag’n’drop file uploads with image previews.';
    $breadcrumbs = ["/"=>"Home","/Interface"=>"Interface","/Interface/Forms"=>"Forms","/Interface/Forms/Controls"=>"Controls"]
@endphp
@extends('layout',[
'html_tag_data'=>$html_tag_data,
'title'=>$title,
'description'=>$description
])

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/vendor/dropzone.min.css') }}"/>
@endsection

@section('js_vendor')
    <script src="{{ asset('/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/singleimageupload.js') }}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
@endsection

@section('js_page')
    <script src="{{ asset('/js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('/js/forms/controls.dropzone.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Title Start -->
                <section class="scroll-section" id="title">
                    <div class="page-title-container">
                        <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                        @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                    </div>
                </section>
                <!-- Title End -->

                <!-- Content Start -->
                <div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <p class="mb-0">{{ $description }}</p>
                        </div>
                    </div>

                    <!-- Images Start -->
                    <section class="scroll-section" id="images">
                        <h2 class="small-title">Images</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                            <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('signature') }}">
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">Signature:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-success">Save</button>
                    </form>
               </div>
                            </div>
                        </div>
                    </section>
                    <!-- Images End -->
  
            </div>

            <!-- Scrollspy Start -->
            <div class="col-md-auto d-none d-lg-block" id="scrollSpyMenu">
                <ul class="nav flex-column">
                    <li>
                        <a class="nav-link" href="#title">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Title</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#images">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Images</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#textFiles">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Text Files</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#columns">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Columns</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#uploadedFiles">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Uploaded Files</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#filled">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Filled</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#topLabel">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Top Label</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#floatingLabel">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Floating Label</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#singleImageUpload">
                            <i data-cs-icon="chevron-right"></i>
                            <span>Single Image Upload</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Scrollspy End -->
        </div>
    </div>
@endsection

<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
