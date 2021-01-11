 <div class="card entry-card">
     <div class="card-body">
         <p class="text-center h3 font-weight-light mb-3">Select Type</p>
         <!-- Nav pills -->
         <ul class="nav nav-pills nav-justified mb-3">
             <li class="nav-item">
                 <a class="nav-link active" data-toggle="pill" href="#single_entry">Single</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="pill" href="#multiple">Multiple</a>
             </li>
         </ul>


         <!-- Tab panes -->
         <div class="tab-content">
             <div class="tab-pane active" id="single_entry">
                 <form id="add_form_single" action="" method="post" class="was-validated">
                     <div class="form-group">
                         <label for="">Number</label>
                         <input type="tel" autofocus="on" pattern="\d{1,2}|^(?=\d{3}$)1*2*3*4*5*6*7*8*9*0*$" name="number" autocomplete="off" maxlength="3" class="form-control" placeholder="000" required>
                         <small class="text-muted">*Max 3 Digit Numbers in ascending</small>
                         <div class="invalid-feedback">Please fill out this field.</div>
                     </div>
                     <div class="form-group d-flex flex-wrap">
                         <span id="number" class="panna badge badge-primary badge-secondary col m-1">Number</span>
                         <span id="bracket" class="panna badge badge-primary badge-secondary col m-1">Bracket</span>
                         <span id="single" class="panna badge badge-primary badge-secondary col m-1">Single</span>
                         <span id="double" class="panna badge badge-primary badge-secondary col m-1">Double</span>
                         <span id="tripple" class="panna badge badge-primary badge-secondary col m-1">Tripple</span>
                     </div>
                     <input type="hidden" name="panna" required>
                     <script>
                         $('#add_form_single [name="number"]').keyup(function() {
                             $('[data-dismiss="alert"]').click();

                             if ($(this).val().length == 3) {
                                 if (charRepeat($(this).val()) == 1) $('#single').removeClass('badge-secondary')

                                 if (charRepeat($(this).val()) == 2) $('#double').removeClass('badge-secondary')

                                 if (charRepeat($(this).val()) == 3) $('#tripple').removeClass('badge-secondary')

                             } else $('.panna').addClass('badge-secondary');

                             if ($(this).val().length == 1) $('#number').removeClass('badge-secondary')
                             else $('#number').addClass('badge-secondary');

                             if ($(this).val().length == 2) $('#bracket').removeClass('badge-secondary')
                             else $('#bracket').addClass('badge-secondary');

                             $('#add_form_single [name="panna"]').val($('.panna:not(.badge-secondary)').text());

                         });

                         function charRepeat(inputString) {
                             var searchChar, count = 0,
                                 maxCount = 0;
                             for (var i = 0; i < inputString.length; i++) {
                                 searchChar = inputString[i];
                                 for (var j = 0; j < inputString.length; j++) {
                                     if (searchChar == inputString[j]) {
                                         count += 1;
                                     }
                                 }
                                 if (count > maxCount) maxCount = count;
                                 count = 0;
                             }
                             return maxCount;
                         }

                         $('#add_form_single').submit(function(e) {
                             e.preventDefault(); // avoid to execute the actual submit of the form.

                             $.ajax({
                                 type: "POST",
                                 url: "/request/add_form_single.php",
                                 data: $(this).serialize(), // serializes the form's elements.
                                 success: function(data) {
                                     $('.response').html(data);
                                 }
                             });
                         })
                     </script>

                     <div class="form-group">
                         <label for="">Amount</label>
                         <input type="number" pattern="\d{1,}" name="amount" autocomplete="off" class="form-control" placeholder="₹ " required>
                         <div class="invalid-feedback">Please fill out this field.</div>
                     </div>
                     <div class="form-group">
                         <button type="submit" name="add_record" class="w-100 btn btn-success"> Submit </button>
                     </div>
                 </form>


             </div>
             <div class="tab-pane fade" id="multiple">
                 <form id="add_form_multiple" action="" method="post" class="was-validated">

                     <!-- <input type="hidden" name="amount_each"> -->
                     <input type="hidden" name="panna">

                     <div class="form-group">
                         <label for="">Number</label>
                         <input type="tel" autofocus="on" pattern="\d{1}" name="number" autocomplete="off" maxlength="1" class="form-control" placeholder="0" required>
                         <small class="text-muted">*Only 1 Digit Number</small>
                         <div class="invalid-feedback">Please fill out this field.</div>

                         <script>
                             function panel_array(n) {
                                 var panel_array = [];
                                 var re = /^1*2*3*4*5*6*7*8*9*0*$/;
                                 for (i = 100; i < 1000; i++) {
                                     if (re.test(i)) {
                                         sum = 0;
                                         value = i;
                                         while (value) {
                                             sum += value % 10;
                                             value = Math.floor(value / 10);
                                         }
                                         if (Number(n) == (sum % 10)) {
                                             // console.log('Number : ' + i + ' Panel : ' + sum % 10);
                                             panel_array.push(i);
                                         }
                                     }
                                 }
                                 if (n == 0) panel_array.push("000");
                                 return panel_array;
                             }
                         </script>
                     </div>
                     <div class="form-group">
                         <label for="">Select Panel</label>
                         <div class="d-flex justify-content-around border p-2">
                             <button type="button" data-panna="all" class="btn btn-primary btn-secondary px-3 py-2 btn-panel">All</button>
                             <button type="button" data-panna="sp" class="btn btn-primary btn-secondary px-3 py-2 btn-panel">SP</button>
                             <button type="button" data-panna="dp" class="btn btn-primary btn-secondary px-3 py-2 btn-panel">DP</button>
                             <button type="button" data-panna="tp" class="btn btn-primary btn-secondary px-3 py-2 btn-panel">TP</button>
                         </div>
                     </div>
                     <script>
                         $('.btn-panel').click(function() {
                             if (($('#add_form_multiple [name="number"]').val()) != '') {

                                 $('.btn-panel').addClass('btn-secondary');
                                 $(this).removeClass('btn-secondary');
                                 $('#add_form_multiple [name="number[]"]').remove();


                                 $('.number_list').html('');
                                 $('.panna-name').text($('#add_form_multiple [name="number"]').val());

                                 array_n = panel_array($('#add_form_multiple [name="number"]').val());
                                 count = 0;

                                 $('.panel-name').text($(this).attr('data-panna'));
                                 switch ($(this).attr('data-panna')) {
                                     case 'all':
                                         for (val of array_n) {
                                             $('#add_form_multiple .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                                             $('#add_form_multiple').append('<input type="hidden" name="number[]" value="' + val + '">');
                                             $('#add_form_multiple [name="panna"]').val('Full');
                                             console.log(val);
                                             count++;
                                         }
                                         break;

                                     case 'sp':
                                         for (val of array_n) {
                                             if (charRepeat(val.toString()) == 1) {
                                                 $('#add_form_multiple .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                                                 $('#add_form_multiple').append('<input type="hidden" name="number[]" value="' + val + '">');
                                                 $('#add_form_multiple [name="panna"]').val('Single');

                                                 console.log(val);
                                                 count++;
                                             }
                                         }
                                         break;

                                     case 'dp':
                                         for (val of array_n) {
                                             if (charRepeat(val.toString()) == 2) {
                                                 $('#add_form_multiple .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                                                 $('#add_form_multiple').append('<input type="hidden" name="number[]" value="' + val + '">');
                                                 $('#add_form_multiple [name="panna"]').val('Double');
                                                 console.log(val);
                                                 count++;
                                             }
                                         }
                                         break;

                                     case 'tp':
                                         for (val of array_n) {
                                             if (charRepeat(val.toString()) == 3) {
                                                 $('#add_form_multiple .number_list').append('<span class="mr-2 font-weight-bold d-inline-block">' + val + '</span>');
                                                 $('#add_form_multiple').append('<input type="hidden" name="number[]" value="' + val + '">');
                                                 $('#add_form_multiple [name="panna"]').val('Tripple');
                                                 console.log(val);
                                                 count++;
                                             }
                                         }
                                         break;
                                 }
                                 $('#add_form_multiple .count-in').text(count);
                                 $('#add_form_multiple [name="amount"]').val('');
                                 $('.cost').text('0');
                             }
                         })
                     </script>
                     <style>
                         .panel-frame {
                             margin-bottom: 1rem;
                             padding: 1rem;
                             background: #eee;
                             border-radius: 10px;
                             box-shadow: 0px 2px 5px #555;
                         }

                         .number_list {
                             background: #fff;
                             box-shadow: 0 0 5px inset;
                             border-radius: 5px;
                             padding: 10px;
                             margin: -10px;
                         }
                     </style>
                     <div class="panel-frame">
                         <div class="d-flex justify-content-between">
                             <p class="small">Panna : <span class="badge p-2 badge-success panna-name font-weight-bold">0</span></p>
                             <p class="small"><span class="badge p-2 badge-primary panel-name font-weight-bold text-uppercase">Panel</span></p>
                             <p class="small">Count : <span class="badge p-2 badge-dark count-in font-weight-bold">0</span></p>
                         </div>
                         <div class="number_list text-center">
                             Empty
                         </div>

                     </div>
                     <div class="form-group">
                         <label for="">Amount</label>
                         <input type="tel" pattern="\d{1,}" name="amount" autocomplete="off" class="form-control" placeholder="₹ " required>
                         <div class="invalid-feedback">Please fill out this field.</div>
                     </div>

                     <p class="cost-for-each text-center h5 font-weight-light mb-3"><b>₹ <span class="cost">0</span></b> Total Amount</p>

                     <script>
                         $('#add_form_multiple [name="amount"]').bind('input propertrychange', function() {
                             var cost = Number($(this).val()) * Number($('#add_form_multiple .count-in').text());
                             $('#add_form_multiple .cost').text(cost.toFixed(2));
                         })
                     </script>
                     <div class="form-group">
                         <button type="submit" name="add_record" class="w-100 btn btn-success"> Submit </button>
                     </div>
                 </form>

                 <script>
                     $('#add_form_multiple').submit(function(e) {
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
                 </script>
             </div>
         </div>
     </div>
 </div>