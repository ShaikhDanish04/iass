<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>


    <video id="preview"></video>

    <button class="btn btn-primary start">Start</button>
    <button class="btn btn-danger stop">Stop</button>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
        });
        scanner.addListener('scan', function(content) {
            alert(content);
        });
        $('.start').click(function() {
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        })

        $('.stop').click(function() {
            scanner.stop();
        })
    </script>

</body>

</html>