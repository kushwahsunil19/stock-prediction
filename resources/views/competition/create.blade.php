@extends('layouts.master')

@section('styles')
if (Auth::check() && Auth::user()->role_type == 'superadmin')
{
$admin = true;
}else{
$admin = false;
}
<link rel="stylesheet" href="{{asset('build/assets/libs/filepond/filepond.min.css')}}">
<link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
<link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
<link rel="stylesheet" href="{{asset('build/assets/libs/dropzone/dropzone.css')}}">


<link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/classic.min.css')}}">
<link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/monolith.min.css')}}">
<link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/nano.min.css')}}">

<!-- FlatPickr CSS -->
<link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<style>
    .cke_notification_warning {
        display: none;
    }
</style>
@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Competitions</h1>

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Competition</li>
            </ol>
        </div>
    </div>
<!-- PAGE-HEADER END -->

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Competition</h3>
                </div>
                <div class=" card-body row">
                    <form id="addaccountForm" method="POST" action="{{ route('competitions.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="package" class="form-label">Name of competition </label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="package" class="form-label">Length of Sprint </label>
                                <input type="number" class="form-control" id="sprint" name="sprint" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="package" class="form-label">Start Date </label>
                                <input type="date" class="form-control" id="startdate" name="startdate" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="package" class="form-label">End Date </label>
                                <input type="date" class="form-control" id="enddate" name="enddate" required>
                            </div>
                            <!-- <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">No of free token </label>
                                            <input type="number" class="form-control" id="token_no" name="token_no" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Expiry date of token </label>
                                            <input type="date" class="form-control" id="token_expiry_date" name="token_expiry_date" required>
                                        </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="package" class="form-label">No of free token </label>
                                <input type="number" class="form-control" id="token_no" name="token_no" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="package" class="form-label">News Heading </label>
                                <input type="text" class="form-control" id="news_heading" name="news_heading" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="package" class="form-label">Summary </label>
                                <textarea id="editor_summary" name="summary" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="package" class="form-label">Rule of competition </label>
                                <textarea id="editor_rule" name="rule_of_competition" class="form-control"></textarea>
                            </div>
                        </div>
                   



                        <div class="modal-footer">
                            <a href="{{ route('competitions.index') }}"  class="btn btn-light" >Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- End Row-->


</div>
<!-- CONTAINER CLOSED -->

@endsection

@section('scripts')


<script src="{{asset('build/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
<script src="{{asset('build/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
<script src="{{asset('build/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js')}}"></script>

<!-- Dropzone JS -->
<script src="{{asset('build/assets/libs/dropzone/dropzone-min.js')}}"></script>

<!-- Color Picker JS -->
@vite('resources/assets/js/color-picker.js')

<!-- Date & Time Picker JS -->
<script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>

<!-- FORMELEMENTS JS -->
@vite('resources/assets/js/formelementadvnced.js')
<script>
    // Replace the textarea with CKEditor
    CKEDITOR.replace('editor_rule');
</script>
<script>
    CKEDITOR.replace('editor_summary');
</script>

@endsection
