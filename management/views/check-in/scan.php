<div class="container text-center">
    <p class="h3 my-4">Customer Check-In</p>
    <hr>
    <div class=" mt-4 d-flex justify-content-center">
        <?php
        include('qr_scanner.php');
        ?>
    </div>
</div>

<script>
    $('.scan').click(function() {
        let result = scanner.scan()

        if (result != null) {
            alert(result.content);
        } else {
            alert('Invalid');
        }
    })
</script>