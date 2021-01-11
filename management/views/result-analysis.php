<style>
    .input-check-lg {
        height: 35px;
        width: 35px;
    }
</style>
<div class="container">

    <p class="display-4 text-center mt-4">Record Analysis</p>
    <div class="card mb-3">
        <div class="card-body">
            <p class="h3 text-center">Total Cost : <span class="text-success">

                    <?php
                    $total = 0;
                    if ($admin_access) $cost_result = $conn->query("SELECT (`cost`) FROM record");
                    else $cost_result = $conn->query("SELECT (`cost`) FROM record WHERE `by_user`='$user'");

                    while ($cost = $cost_result->fetch_assoc()) {

                        $total = $cost['cost'] + $total;
                    }
                    echo "₹ " . $total;
                    ?>
                </span>
            </p>

        </div>
    </div>
    <form id="filter_form" action="" method="get">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">

                            <p class="h3"><i class="fa fa-filter"></i> Filter</p>
                            <a href="<?php echo $addr_space ?>result-analysis/" class="btn btn-primary"><i class="fas fa-sync"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <span class="text-center text-center bg-primary text-light p-1 rounded">
                                <input type="checkbox" <?php echo (isset($_GET['n']) ? (isset($_GET['p']['sp']) ? 'checked' : '') : 'checked') ?> class="input-check-lg" value="3" name="p[sp]">
                                <p class="m-0">SP</p>
                            </span>
                            <span class="text-center text-center bg-primary text-light p-1 rounded">
                                <input type="checkbox" <?php echo (isset($_GET['n']) ? (isset($_GET['p']['dp']) ? 'checked' : '') : 'checked') ?> class="input-check-lg" value="2" name="p[dp]">
                                <p class="m-0">DP</p>
                            </span>
                            <span class="text-center text-center bg-primary text-light p-1 rounded">
                                <input type="checkbox" <?php echo (isset($_GET['n']) ? (isset($_GET['p']['tp']) ? 'checked' : '') : 'checked') ?> class="input-check-lg" value="1" name="p[tp]">
                                <p class="m-0">TP</p>
                            </span>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#filter_form input[type="checkbox"]').click(function() {
                                    $('#filter_form').submit();
                                })
                            })
                        </script>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around flex-wrap numbers">
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">1</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['1']) ? 'checked' : '') ?> class="input-check-lg" name="n[1]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">2</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['2']) ? 'checked' : '') ?> class="input-check-lg" name="n[2]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">3</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['3']) ? 'checked' : '') ?> class="input-check-lg" name="n[3]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">4</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['4']) ? 'checked' : '') ?> class="input-check-lg" name="n[4]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">5</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['5']) ? 'checked' : '') ?> class="input-check-lg" name="n[5]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">6</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['6']) ? 'checked' : '') ?> class="input-check-lg" name="n[6]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">7</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['7']) ? 'checked' : '') ?> class="input-check-lg" name="n[7]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">8</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['8']) ? 'checked' : '') ?> class="input-check-lg" name="n[8]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">9</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['9']) ? 'checked' : '') ?> class="input-check-lg" name="n[9]">
                            </span>
                            <span class="text-center bg-dark mx-3 my-2 text-light p-1 rounded">
                                <p class="m-0">0</p>
                                <input type="checkbox" <?php echo (isset($_GET['n']['0']) ? 'checked' : '') ?> class="input-check-lg" name="n[0]">
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <div class="card">
        <div class="card-body">
            <table id="analysis_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Number</th>
                        <th>Cost</th>
                        <th class="text-center">Panna</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if ($admin_access) $number_result = $conn->query("SELECT (`number`) FROM record");
                    else $number_result = $conn->query("SELECT (`number`) FROM record WHERE `by_user`='$user'");

                    $number_array = array();

                    while ($number = $number_result->fetch_assoc()) {
                        if (isset($_GET['p'])) {
                            // print_r($_GET['p']);

                            if (isset($_GET['n'])) {
                                foreach ($_GET['n'] as $k => $n) {
                                    if (substr(array_sum(str_split($number['number'])), -1) == $k) {
                                        foreach ($_GET['p'] as $p) {
                                            if (count(array_unique(str_split($number['number']))) == $p) {
                                                array_push($number_array, $number['number']);
                                            }
                                        }
                                    }
                                }
                            } else {
                                foreach ($_GET['p'] as $p) {
                                    if (count(array_unique(str_split($number['number']))) == $p) {
                                        array_push($number_array, $number['number']);
                                    }
                                }
                            }
                        } else {
                            array_push($number_array, $number['number']);
                        }
                    }

                    foreach (array_unique($number_array) as $value) {
                        if ($admin_access) $result = $conn->query("SELECT * FROM record WHERE `number` = '$value'");
                        else $result = $conn->query("SELECT * FROM record WHERE `number` = '$value' AND`by_user`='$user'");

                        $cost = 0;
                        while ($row = $result->fetch_assoc()) {
                            $cost = $row['cost'] + $cost;
                            $number = $row['number'];
                            // $panna = $row['panna'];
                            $panna = substr(array_sum(str_split($number)), -1);
                            $panel = count(array_unique(str_split($number)));

                            switch ($panel) {
                                case 3:
                                    $panel = "<div class='badge badge-info p-2'>SP</div>";
                                    break;
                                case 2:
                                    $panel = "<div class='badge badge-info p-2'>DP</div>";
                                    break;
                                case 1:
                                    $panel = "<div class='badge badge-info p-2'>TP</div>";
                                    break;
                            }
                        }
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td class='text-center'><p class='number'>" . $number . "</p></td>";
                        echo "<td class='text-center'><p class='cost'>" . $cost . "</p></td>";
                        echo "<td class='text-center'><div class='badge badge-dark p-2 mr-2'>" . $panna . "</div>" . $panel . "</td>";

                        echo "</tr>";

                        $result->data_seek(0);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        var analysisTable = $('#analysis_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [2, 'dec']
            ]
        });

        analysisTable.on('order.dt search.dt', function() {
            analysisTable.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('table').parent().addClass('table-responsive');
    });
</script>