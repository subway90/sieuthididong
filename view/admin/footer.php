<!-- template chuẩn -->
    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a> -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=URL?>/publics/admin/lib/easing/easing.min.js"></script>
    <script src="<?=URL?>/publics/admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="<?=URL?>/publics/admin/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?=URL?>/publics/admin/mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="<?=URL?>/publics/admin/js/main.js"></script>
    <!-- js của template chuẩn -->
    <script src="<?=URL?>/publics/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/feather-icons/feather.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/simplebar/simplebar.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/highlight.js/highlight.pack.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/quill/quill.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/air-datepicker/js/datepicker.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/select2/js/select2.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
    <script src="<?=URL?>/publics/admin/vendor/chart.js/chart.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/nouislider/nouislider.min.js"></script>
    <script src="<?=URL?>/publics/admin/vendor/fullcalendar/main.min.js"></script>
    <script src="<?=URL?>/publics/admin/js/stroyka.js"></script>
    <script src="<?=URL?>/publics/admin/js/custom.js"></script>
    <script src="<?=URL?>/publics/admin/js/calendar.js"></script>
    <script src="<?=URL?>/publics/admin/js/demo.js"></script>
    <script src="<?=URL?>/publics/admin/js/demo-chart-js.js"></script>
    <!-- js custom by subway90 -->
    <script src="<?=URL?>/publics/js/image.js"></script>
    <script src="<?=URL?>/publics/js/custom-copytext.js"></script>
    <!-- Summernote JS - CDN Link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            // $("#description_news").summernote();
            $('#shortDecribe').summernote({
                placeholder: 'Nhập nội dung mô tả ngắn',
                tabsize: 2,
                height: 100
            });
            $('#decribe').summernote({
                placeholder: 'Nhập nội dung bài viết',
                tabsize: 2,
                height: 300
            });
            // $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</body>
</html>