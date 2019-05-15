@extends('layouts.head')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>图像检索</h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>拖动上传图片</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="my-awesome-dropzone" class="dropzone" action="upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="dropzone-previews"></div>
                        <button type="submit" class="btn btn-primary pull-right">开始检索!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content" id="gallery_zone">
                    <h2 id="map"></h2>
                    <div class="lightBoxGallery">
                        <div id="gallery">
                        </div>
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
<script src="/assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script>
    $('#MM2').addClass("active");
    $(document).ready(function() {
        $("#gallery_zone").hide()
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
                this.on("success", function(e) {
                    $("#gallery_zone").show()
                    let response = JSON.parse(e.xhr.response)
                    let files = response['files']
                    let map1 = response['map@1']
                    let map50 = response['map@50']
                    files = files.map(function(file){
                        let file_length = file.lastIndexOf(".")
                        let name = file.substring(0, file_length)
                        let subclass = name.substring(name.lastIndexOf(".")+1, name.lastIndexOf("/"))
                        let ext = file.substring(file_length + 1,)
                        let thumbnail = name + 's.' + ext
                        return `<a href="/assets/img/birds/${file}" title="${subclass}" data-gallery=""><img src="/assets/img/thumbnails/${thumbnail}"></a>`
                    })
                    let html_str = files.join('');
                    $('#gallery').html(html_str)
                    $('#map').html(`mAP@1:${map1}<br/>mAP@50:${map50}`)
                    console.log(`mAP@1:${map1}<br/>mAP@50:${map50}`)
                    console.log(html_str)
                });
                this.on("successmultiple", function(files, response) {
                    console.log('multiple success')
                });
                this.on("errormultiple", function(files, response) {});
            }
        }
    });
</script>
@endsection
