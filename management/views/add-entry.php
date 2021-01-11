<style>
    input[name="number"] {
        font-size: 40px;
        letter-spacing: 10px;
        text-align: center;
    }

    input[name="amount"] {
        font-size: 30px;
    }

    input[type="radio"] {
        height: 20px;
        width: 30px;
    }

    .entry-card {
        max-width: 400px;
        margin: 2rem auto;
        box-shadow: 2px 2px 15px #ccc;
    }
</style>

<div class="container">

    <p class="display-4 text-center mt-4">Add Record</p>

    <div class="response"></div>

    <!-- Nav tabs -->
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel_tab">Panel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#motor_tab">Motor Panna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cycle_tab">Cycle Panna</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="panel_tab">
            <?php include('views/add-entry/panel.php') ?>
        </div>
        <div class="tab-pane fade" id="motor_tab">
            <?php include('views/add-entry/motor_panna.php') ?>
        </div>
        <div class="tab-pane fade" id="cycle_tab">
            <?php include('views/add-entry/cycle_panna.php') ?>
        </div>
    </div>


</div>

<script>
    function panel_loop(n) {
        var n = n.toString();
        var panel_array = [];
        var re = /^1*2*3*4*5*6*7*8*9*0*$/;
        for (i = 100; i < 1000; i++) {
            if (re.test(i)) {
                if (i.toString().includes(n)) {
                    panel_array.push(i.toString());
                }
            }
        }
        if (n == '0') panel_array.push("000");
        return panel_array;
    }
    $(document).ready(function() {

        $('a[href="' + localStorage.getItem('tab') + '"]').tab('show');

        $('.nav a').on('show.bs.tab', function(event) {
            var x = $(event.target).attr('href');
            localStorage.setItem('tab', x);
        });


    })
</script>