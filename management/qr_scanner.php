<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<div class="card" style="width: 350px">
    <div class="card-body text-center">
        <p class="h3">QR Code Scanner</p>
        <div class="rounded mb-3 bg-light video-container">
            <video class="rounded" height="300" width="300" id="preview" style="object-fit: cover;"></video>
        </div>
        <div class="cameras btn-group mb-3">
            <!-- <button class="btn btn-primary start">Start</button> -->
            <button class="btn btn-danger stop">Stop</button>
            <button class="btn btn-dark mirror">Mirror</button>
        </div>
        <!-- <div>
            <button class="btn btn-success mx-1 scan">Scan</button>
        </div> -->
    </div>
</div>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
    });
    // console.log(scanner);
    // scanner.addListener('scan', function(content) {
    //     alert(content);
    // });

    // $('.scan').click(function() {
    //     let result = scanner.scan()

    //     if (result != null) {
    //         alert(result.content);
    //     } else {
    //         alert('No QR Found');
    //     }
    // })


    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            for (i = 0; i < cameras.length; i++) {
                $('.cameras').prepend('<button class="btn btn-primary start" data-id="' + i + '">' + cameras[i].name + '</button>');
                $('.start[data-id="' + i + '"]').data('id', cameras[i]);
                scanner.start(cameras[0]);
            }
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    $(document).on('click', '.start', function() {
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