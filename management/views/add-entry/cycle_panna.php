<div class="card entry-card">
    <div class="card-body">
        <p class="text-center h3 font-weight-light mb-3">Cycle Panna</p>

        <form id="add_cycle_panna" action="" method="post" class="was-validated">
            <input type="hidden" name="panna" value="Cycle">

            <div class="form-group">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <label for="" class="m-0">Number</label>
                    <button class="btn btn-sm btn-primary btn-secondary double-button" value="0" type="button">Double</button>
                </div>
                <div class="rounded border p-3">
                    <script>
                        $(document).ready(function() {
                            $('.double-button').click(function() {
                                number_array = [];
                                if ($(this).val() == '0') {
                                    $(this).val(1);
                                    $(this).removeClass('btn-secondary')
                                } else {
                                    $(this).val(0);
                                    $(this).addClass('btn-secondary')
                                }
                                $('#add_cycle_panna .number-check').removeAttr('disabled');
                                $('#add_cycle_panna .number_list').html('Empty');
                                $('#add_cycle_panna input[type="checkbox"].number-check').prop('checked', false);


                                console.log($(this).val());
                            })
                            $('#add_cycle_panna input[type="checkbox"].number-check').change(function() {
                                var number_array = [];
                                if ($('#add_cycle_panna .number-check:checked').length > 1 && $('.double-button').val() == 0) {
                                    number_array = [];

                                    panel_loop($('#add_cycle_panna .number-check:checked')[0].value).forEach(n => {
                                        if (n.includes($('#add_cycle_panna .number-check:checked')[1].value)) {
                                            number_array.push(n);
                                        }
                                    })
                                    $('#add_cycle_panna .number-check').attr('disabled', 'true');
                                    $('#add_cycle_panna .number-check:checked').removeAttr('disabled');
                                } else if ($('#add_cycle_panna .number-check:checked').length == 1 && $('.double-button').val() == 1) {
                                    number_array = [];

                                    panel_loop($('#add_cycle_panna .number-check:checked')[0].value).forEach(n => {
                                        x = $('#add_cycle_panna .number-check:checked')[0].value;
                                        if (charRepeat(n) == 2 || charRepeat(n) == 3) {
                                            if (n.includes(x + x)) {
                                                number_array.push(n);
                                            }
                                        }
                                    })
                                    $('#add_cycle_panna .number-check').attr('disabled', 'true');
                                    $('#add_cycle_panna .number-check:checked').removeAttr('disabled');
                                } else {
                                    $('#add_cycle_panna .number-check').removeAttr('disabled');

                                }
                                if (number_array.length == 0) {
                                    $('#add_cycle_panna .number_list').html('Empty');
                                } else {
                                    $('#add_cycle_panna .number_list').html('');
                                }
                                $('#add_cycle_panna .count-in').text('0');
                                $.each(number_array, function(i, val) {
                                    $('#add_cycle_panna .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                                    $('#add_cycle_panna .number_list').append('<input type="hidden" name="number[]" value="' + val + '">');
                                })
                                $('#add_cycle_panna .count-in').text($('#add_cycle_panna [name="number[]"]').length);
                            });
                            $('#add_cycle_panna').submit(function(e) {
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
                        });
                    </script>

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
                    <p class="small">Panna : <span class="badge p-2 badge-success panna-name font-weight-bold">Cycle</span></p>
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
            <button type="submit" name="add_record" class="w-100 btn btn-success"> Submit </button>
        </form>
    </div>
</div>