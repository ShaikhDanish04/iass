<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<div class="container-fluid">
    <div class="card" style="width: 350px">
        <div class="card-body text-center">
            <p class="h3">QR Code Scanner</p>
            <div class="rounded mb-3 bg-light video-container">
                <video class="" id="preview"></video>
            </div>
            <div class="cameras btn-group">
                <!-- <button class="btn btn-primary start">Start</button> -->
                <button class="btn btn-danger stop">Stop</button>
                <button class="btn btn-dark mirror">Mirror</button>
            </div>
        </div>
    </div>
</div>
<style>
    .video-container {
        height: 300px;
        width: 300px;
    }

    .video-container video {
        width: 100%;
        height: auto;
    }
</style>



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
                $('.cameras').prepend('<button class="btn btn-primary start" data-id="' + i + '">' + cameras[i].name + '</button>');
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