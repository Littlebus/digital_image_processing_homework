@extends('layouts.head')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Image Search</h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>拖动上传图片</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="upload">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_file_upload.html#">Config option 1</a>
                                </li>
                                <li><a href="form_file_upload.html#">Config option 2</a>
                                </li>
                            </ul> -->
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="my-awesome-dropzone" class="dropzone" action="upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="dropzone-previews"></div>
                        <button type="submit" class="btn btn-primary pull-right">Submit this form!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <h2>mAP@1=66.4%<br/>
                        mAP@50=76.1%</h2>
                    <div class="lightBoxGallery">
                        <!-- TODO:添加缩略图 -->
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>
                        <a href="assets/img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img src="assets/img/gallery/11s.jpg"></a>

                        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="/assets/js/jquery-2.1.1.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/js/inspinia.js"></script>
<script src="/assets/js/plugins/pace/pace.min.js"></script>

<!-- Data picker -->
<script src="/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- FooTable -->
<script src="/assets/js/plugins/footable/footable.all.min.js"></script>
<script src="/assets/js/plugins/select2/select2.full.min.js"></script>

<script src="/assets/js/plugins/dataTables/datatables.min.js"></script>
<!-- Flot -->
<script src="/assets/js/plugins/flot/jquery.flot.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/assets/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/js/inspinia.js"></script>
<script src="/assets/js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->
<script src="/assets/js/plugins/dropzone/dropzone.js"></script>

<script>
    $('#MM2').addClass("active");
    $(document).ready(function() {

        Dropzone.options.myAwesomeDropzone = {

            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,

            // Dropzone settings
            init: function() {
                var myDropzone = this;

                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("sendingmultiple", function() {});
                this.on("successmultiple", function(files, response) {});
                this.on("errormultiple", function(files, response) {});
            }

        }
    });
</script>
@endsection