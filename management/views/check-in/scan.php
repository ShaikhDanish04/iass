<div class="container">
    <p class="h3 my-4 text-center">Customer Check-In</p>
    <hr>
    <div class=" mt-4 d-flex justify-content-center">
        <?php
        include('qr_scanner.php');
        ?>
    </div>
</div>

<script>
    // $('.scan').click(function() {
    //     let result = scanner.scan()


    //     if (result != null) {
    //         // alert(result.content);
    //         code = result.content.split('_');

    //         if (code[0] == 'ticket') {
    //             location.href = 'submit?id=' + code[1];
    //         }

    //     } else {
    //         alert('Invalid');
    //     }
    // })

    scanner.addListener('scan', function(content) {
        code = content.split('_');

            if (code[0] == 'ticket') {
                location.href = 'submit?id=' + code[1];
            }
    });
</script>