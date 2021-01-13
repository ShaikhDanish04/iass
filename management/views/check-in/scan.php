<div class="container">
    <p class="h3">Customer Check-In</p>
    <?php
    include('qr_scanner.php');
    ?>
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