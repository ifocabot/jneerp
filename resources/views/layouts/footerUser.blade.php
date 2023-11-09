</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {
        // Initialize Select2
        $('#vehicelsSelect').select2();

        // Handle change event on the select element
        $('#vehicelsSelect').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find(':selected');

            // Get the data-last-oddo attribute value
            var lastOddoValue = selectedOption.data('last-oddo');

            // Update the value of oddo_meter_out input
            $('#oddo_meter_out').val(lastOddoValue);
        });
    });
</script>

<script language="JavaScript">
    var cameraStarted = false;

    Webcam.set({
        width: 800,  // Lebar tampilan kamera
        height: 600, // Tinggi tampilan kamera
        image_format: 'jpeg',
        jpeg_quality: 100,
        constraints: {
            width: 640,  // Lebar resolusi gambar yang diambil
            height: 480, // Tinggi resolusi gambar yang diambil
        },
    });

    function toggleCamera() {
        if (!cameraStarted) {
            startCamera();
        } else {
            stopCamera();
        }
    }

    function startCamera() {
        if (!cameraStarted) {
            Webcam.attach('#my_camera');
            document.querySelector('input[value="Take Snapshot"]').style.display = "block";
            document.getElementById('cameraContainer').style.display = "block";
            cameraStarted = true;
        }
    }

    function stopCamera() {
        if (cameraStarted) {
            Webcam.reset();
            document.querySelector('input[value="Take Snapshot"]').style.display = "none";
            document.getElementById('cameraContainer').style.display = "none";
            cameraStarted = false;
        }
    }
    function take_snapshot() {
        startCamera();
        Webcam.snap(function (data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            stopCamera();
        });
    }
</script>

<script>
    // Get the input element and checkbox element
    var odometerInput = document.getElementById('oddo_meter_out');
    var enableInputCheckbox = document.getElementById('enableInput');

    // Add event listener to the checkbox
    enableInputCheckbox.addEventListener('change', function() {
        // If checkbox is checked, remove the readonly attribute; otherwise, add it
        odometerInput.readOnly = !enableInputCheckbox.checked;
    });
</script>

<script>
    $(document).ready(function () {
        var safetyToolsSelect = $("#safetyTools");
        var checkbox = $("#checkbox");

        safetyToolsSelect.select2();

        checkbox.click(function () {
            if (checkbox.is(':checked')) {
                safetyToolsSelect.find('option').prop('selected', true);
            } else {
                safetyToolsSelect.find('option').prop('selected', false);
            }

            safetyToolsSelect.trigger('change');
        });

        safetyToolsSelect.on('change', function () {
            var allSelected = safetyToolsSelect.find('option').length === safetyToolsSelect.find('option:selected').length;
            checkbox.prop('checked', allSelected);
        });
    });
</script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script>
</body>

</html>