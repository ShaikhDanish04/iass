<style>
    .input-check-lg {
        height: 35px;
        width: 35px;
    }
</style>

<div class="card entry-card">
    <div class="card-body">
        <p class="text-center h3 font-weight-light mb-3">Motor Panna</p>

        <form id="add_motor_panna" action="" method="post" class="was-validated">
            <input type="hidden" name="panna" value="Motor">

            <div class="form-group">
                <label for="">Panna</label>

                <div class="d-flex align-items-center justify-content-around border p-3 rounded">
                    <span class="text-center text-center bg-primary text-light mb-3 p-1 rounded">
                        <input type="checkbox" class="input-check-lg panna-check" name="panna_sp">
                        <p class="m-0">SP</p>
                    </span>
                    <span class="text-center text-center bg-primary text-light mb-3 p-1 rounded">
                        <input type="checkbox" class="input-check-lg panna-check" name="panna_dp">
                        <p class="m-0">DP</p>
                    </span>
                    <span class="text-center text-center bg-primary text-light mb-3 p-1 rounded">
                        <input type="checkbox" class="input-check-lg panna-check" name="panna_tp">
                        <p class="m-0">TP</p>
                    </span>
                </div>
            </div>
            <script>
                $(document).ready(function() {

                    var number_sequence = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

                    $('#add_motor_panna .panna-check').click(function() {

                        $('#add_motor_panna .number_list').html('Empty');
                        $('#add_motor_panna input[type="checkbox"].number-check').prop('checked', false);

                        number_sequence = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                        number_array = [];
                    })

                    $('#add_motor_panna input[type="checkbox"].number-check').change(function() {
                        var number_array = [];
                        if (this.checked) {
                            number_sequence = number_sequence.filter(v => v !== Number($(this).val()))
                        } else {
                            number_sequence.push(Number($(this).val()));
                        }

                        if ($('#add_motor_panna [name="panna_sp"]')[0].checked) {
                            $.each($('#add_motor_panna .number-check:checked'), function(i, o) {
                                panel_loop(o.value).forEach(n => {
                                    if (charRepeat(n) == 1 && $('#add_motor_panna .number-check:checked').length > 2) {
                                        number_array.push(n);
                                    }
                                })
                            });
                        }
                        if ($('#add_motor_panna [name="panna_dp"]')[0].checked) {
                            $.each($('#add_motor_panna .number-check:checked'), function(i, o) {
                                panel_loop(o.value).forEach(n => {
                                    if (charRepeat(n) == 2 && $('#add_motor_panna .number-check:checked').length > 2) {
                                        number_array.push(n);
                                    }
                                })
                            });
                        }
                        if ($('#add_motor_panna [name="panna_tp"]')[0].checked) {
                            $.each($('#add_motor_panna .number-check:checked'), function(i, o) {
                                panel_loop(o.value).forEach(n => {
                                    if (charRepeat(n) == 3 && $('#add_motor_panna .number-check:checked').length > 0) {
                                        number_array.push(n);
                                    }
                                })
                            });
                        }
                        $.each(number_sequence, function(i, o) {
                            number_array.forEach(n => {
                                if (n.includes(o.toString())) {
                                    number_array = number_array.filter(v => v !== n)
                                }
                            })
                        });

                        number_array = Array.from(new Set(number_array));

                        if (number_array.length == 0) {
                            $('#add_motor_panna .number_list').html('Empty');
                        } else {
                            $('#add_motor_panna .number_list').html('');
                        }
                        $('#add_motor_panna .count-in').text('0');
                        $.each(number_array, function(i, val) {
                            $('#add_motor_panna .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                            $('#add_motor_panna .number_list').append('<input type="hidden" name="number[]" value="' + val + '">');
                        })
                        $('#add_motor_panna .count-in').text($('#add_motor_panna [name="number[]"]').length);
                    })

                    $('#add_motor_panna').submit(function(e) {
                        e.preventDefault(); // avoid to execute the actual submit of the form.

                        $.ajax({
                            type: "POST",
                            url: "/request/add_form_multiple.php",
                            data: $(this).serialize(), // serializes the form's elements.
                            success: function(data) {
                                $('.response').html(data);
                            }
                        });
                    })
                })
            </script>
            <div class="form-group">
                <label for="">Number</label>
                <div class="rounded border p-3">

                    <div class="d-flex align-items-center justify-content-around">
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">1</p>
                            <input type="checkbox" class="input-check-lg number-check" value="1">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">2</p>
                            <input type="checkbox" class="input-check-lg number-check" value="2">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">3</p>
                            <input type="checkbox" class="input-check-lg number-check" value="3">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">4</p>
                            <input type="checkbox" class="input-check-lg number-check" value="4">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">5</p>
                            <input type="checkbox" class="input-check-lg number-check" value="5">
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-around">
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">6</p>
                            <input type="checkbox" class="input-check-lg number-check" value="6">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">7</p>
                            <input type="checkbox" class="input-check-lg number-check" value="7">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">8</p>
                            <input type="checkbox" class="input-check-lg number-check" value="8">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">9</p>
                            <input type="checkbox" class="input-check-lg number-check" value="9">
                        </span>
                        <span class="text-center bg-dark text-light mb-3 p-1 rounded">
                            <p class="m-0">0</p>
                            <input type="checkbox" class="input-check-lg number-check" value="0">
                        </span>
                    </div>
                </div>
            </div>
            <div class="panel-frame">
                <div class="d-flex justify-content-between">
                    <p class="small">Panna : <span class="badge p-2 badge-success panna-name font-weight-bold">Motor</span></p>
                    <p class="small"><span class="badge p-2 badge-primary panel-name font-weight-bold text-uppercase">Panel</span></p>
                    <p class="small">Count : <span class="badge p-2 badge-dark count-in font-weight-bold">0</span></p>
                </div>
                <div class="number_list text-center">
                    Empty
                </div>

            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" pattern="\d{1,}" name="amount" autocomplete="off" class="form-control" placeholder="₹ " required="" field_signature="498263276" form_signature="16810855662723327916">
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="w-100 btn btn-success"> Submit </button>
        </form>
    </div>
</div>