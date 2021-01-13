<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>


    <video id="preview"></video>

    <div class="cameras">
        <!-- <button class="btn btn-primary start">Start</button> -->
    </div>
    <button class="btn btn-danger stop">Stop</button>

    <button class="btn btn-dark mirror">Mirror</button>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
        });
        scanner.addListener('scan', function(content) {
            alert(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                for (i = 0; i < cameras.length; i++) {
                    console.log(cameras[i]);
                    $('.cameras').append('<button class="btn btn-primary start" data-id="' + i + '">Camera ' + (i + 1) + '</button>');
                    $('.start[data-id="' + i + '"]').data('id', cameras[i]);
                }
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
        $(document).on('click', '.start', function() {
            console.log($(this).data('id'));
            scanner.start($(this).data('id'));
        })

        $('.stop').click(function() {
            scanner.stop();
        })
        $('.mirror').click(function() {
            if (scanner.mirror) {
                scanner.mirror = false;
            } else {
                scanner.mirror = true;
            }
        })
    </script>

</body>

</html>