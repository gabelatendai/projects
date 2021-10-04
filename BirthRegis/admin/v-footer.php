<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/menumaker.min.js"></script>
<script src="js/custom-script.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/offcanvas.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/fastclick.js"></script>

<script src="js/jquery.slidereveal.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false // Default: false
        });
    });
</script>
<script src="js/jquery.uploadPreview.js"></script>
<script src="js/summernote-bs4.js"></script>
<!-- nice-select js -->