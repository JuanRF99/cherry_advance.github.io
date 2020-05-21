$(document).ready(function() {
    // ============ Generate ID ==============

    function dec2hex(dec) {
        return ('0' + dec.toString(16)).substr(-2)
    }

    // generateId :: Integer -> String
    function generateId(len) {
        var arr = new Uint8Array((len || 40) / 2)
        window.crypto.getRandomValues(arr)
        return Array.from(arr, dec2hex).join('')
    }

    // =========== End Generate ID =============

    // =========== DataTable ===================

    $('#tabledata').DataTable({
        retrieve: true,
        "lengthMenu": [
            [5, 25, 50, -1],
            [5, 25, 50, "All"]
        ]
    });

    $('#reportTable').DataTable({
        retrieve: true,
        "lengthMenu": [
            [5, 25, 50, -1],
            [5, 25, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'excel',
                filename: generateId(),
                title: 'Data Employee List'
            },
            {
                extend: 'pdf',
                filename: generateId(),
                title: 'Data Employee List'
            },
            {
                extend: 'print',
                title: 'Data Employee List'
            }
        ]
    });

    $('#payListTable').DataTable({
        retrieve: true,
        "lengthMenu": [
            [5, 25, 50, -1],
            [5, 25, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'excel',
                filename: generateId(),
                title: 'Advance List'
            },
            {
                extend: 'pdf',
                filename: generateId(),
                title: 'Advance List'
            },
            {
                extend: 'print',
                title: 'Advance List'
            }
        ]
    });

    // ============== End DataTable =============

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Dynamic Table

    $('#addbut').click(function() {
        var jumlah = parseInt($('#jumlahrow').val());
        var nextrow = jumlah + 1;
        var newrow = "<tr><td><input type='checkbox' class='form-control' name='actionrows'></td><td><input type='text' class='form-control' name='description[]' required><input type='hidden' name='jumlahrow' value=" + nextrow + " id='jumlahrow'></td><td><input type='number' class='form-control' name='amount[]' required></td><td><input type='text' class='form-control' name='notes[]'></td></tr>";
        $('table tbody').append(newrow);
    });

    $("#deletebut").click(function(e) {
        $("table tbody").find('input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                $(this).parents("tr").remove();
            }
        });
    });

    // End Dynamic Table

    $("#approvedamount").on("input", function() {
        var approve = $("#approvedamount").val();
        if ($("#approvedamount").val() > 0) {
            $("div #adjust").removeClass("invisible");
        }
        elseif(approve < 1)
        $("div #adjust").addClass("invisible");
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    // function currencyFormat(num) {
    //     return 'Rp' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    // }

    $("form").submit(function() {
        if ($('#requestedcost').val() > $('#reqamt').val() || ($('#reqamt').val() < 10000000 && $('#requestedcost').val() >= 10000000)) {
            alert('If your request is more than ' + 'IDR ' + formatNumber($('#reqamt').val()) + ' divide your request by create a new advance and fill out the notes column');
            return false;
        }
        if ($('#requestedcost').val() <= 0) {
            alert('Fill out the request cost!');
            return false;
        }
        if ($('#requestedcost').val() < $('#reqamt').val()) {
            return true;
        }
    });



});