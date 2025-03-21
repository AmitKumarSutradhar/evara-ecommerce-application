
<!-- JQUERY JS -->
<script src="{{ asset('/') }}admin/assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="{{ asset('/') }}admin/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('/') }}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/p-scroll/pscroll.js"></script>

<!-- STICKY JS -->
<script src="{{ asset('/') }}admin/assets/js/sticky.js"></script>


<!-- APEX CHART JS -->
<script src="{{ asset('/') }}admin/assets/js/apexcharts.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('/') }}admin/assets/plugins/select2/select2.full.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('/') }}admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INDEX JS -->
<script src="{{ asset('/') }}admin/assets/js/index1.js"></script>
<script src="{{ asset('/') }}admin/assets/js/index.js"></script>

<!-- Reply JS-->
<script src="{{ asset('/') }}admin/assets/js/reply.js"></script>

<!-- DATA TABLE JS-->
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('/') }}admin/assets/js/table-data.js"></script>

<!-- SELECT2 JS -->
<script src="{{ asset('/') }}admin/assets/plugins/select2/select2.full.min.js"></script>

<!-- FORM ELEMENTS JS -->
<script src="{{ asset('/') }}admin/assets/js/formelementadvnced.js"></script>


<!-- COLOR THEME JS -->
<script src="{{ asset('/') }}admin/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('/') }}admin/assets/js/custom.js"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('/') }}admin/assets/plugins/summernote-editor/summernote1.js"></script>
<script src="{{ asset('/') }}admin/assets/js/summernote.js"></script>

<!--Internal Fileuploads js-->
<script src="{{ asset('/') }}admin/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/fileuploads/js/file-upload.js"></script>

<!--Internal Fancy uploader js-->
<script src="{{ asset('/') }}admin/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/fancyuploder/fancy-uploader.js"></script>

<!-- SWITCHER JS -->
<script src="{{ asset('/') }}admin/assets/switcher/js/switcher.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#categoryImage').attr('src', e.target.result);
                $('#categoryImage').attr('width', '150');
                $('#categoryImage').attr('height', '150');
                $('#categoryImage').attr('object-fit', 'cover');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

<script>
    function selectSubCategory(categoryId){
        $.ajax({
            type: "GET",
            url: "{{  route('get-sub-category-by-category')  }}",
            data: {id: categoryId},
            dataType: "JSON",
            success: function (response){
                // console.log(response);
                var option = '';
                option += '<option value="" disabled selected>-- Select Sub Category --</option>';
                $.each(response, function (key, value) {
                    option +=  '<option value=" ' + value.id +  '"> ' + value.name + '</option>';
                });

                $('#sub-category').empty();
                $('#sub-category').append(option);
            }
        });
    }
</script>
