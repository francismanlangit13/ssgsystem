<script src="<?php echo base_url ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url ?>assets/js/charts.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo base_url ?>assets/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?php echo base_url ?>assets/demo/chart-bar-demo.js"></script> -->
<script src="<?php echo base_url ?>assets/js/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url ?>assets/js/datatables-simple-demo.js"></script>
<script src="<?php echo base_url ?>assets/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- lodash (underscore.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>

<script>
    var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
    function previewImage(frameId, inputId) { // select multiple images viewer if user select desired image.
        let image = document.getElementById(frameId);
        let fileInput = document.getElementById(inputId);
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = base_url + "assets/files/images/system/no-image.png";
        }
    }
</script> 