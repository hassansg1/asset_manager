var toastCount = 0;

function toast(flashMessage,type) {
    var toastIndex = toastCount++;
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: false,
        positionClass: 'toast-top-center',
        preventDuplicates: true,
        onclick: null
    };

    toastr.options.showDuration = parseInt('300');
    toastr.options.hideDuration = parseInt('1000');
    toastr.options.timeOut = parseInt('5000');
    toastr.options.extendedTimeOut = parseInt('1000');
    toastr.options.showEasing = "swing";
    toastr.options.hideEasing = "linear";
    toastr.options.showMethod = "fadeIn";
    toastr.options.hideMethod = "fadeOut";
    toastr.options.tapToDismiss = false;

    let msg = flashMessage;
    let title = '';

    $('#toastrOptions').text('Command: toastr["'+type+'"]("' + msg +  + '")\n\ntoastr.options = ' + JSON.stringify(toastr.options, null, 2));
    var $toast = toastr[type](msg, title); // Wire up an event handler to a button in the toast, if it exists

    $toastlast = $toast;

    if (typeof $toast === 'undefined') {
        return;
    }

    if ($toast.find('#okBtn').length) {
        $toast.delegate('#okBtn', 'click', function () {
            alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
            $toast.remove();
        });
    }

    if ($toast.find('#surpriseBtn').length) {
        $toast.delegate('#surpriseBtn', 'click', function () {
            alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
        });
    }

    if ($toast.find('.clear').length) {
        $toast.delegate('.clear', 'click', function () {
            toastr.clear($toast, {
                force: true
            });
        });
    }
}

/******/
(function () { // webpackBootstrap
    /*!*******************************************!*\
      !** ./resources/js/pages/toastr.init.js **!
      \*******************************************/
    /*
    Template Name: Skote - Admin & Dashboard Template
    Author: Themesbrand
    Website: https://themesbrand.com/
    Contact: themesbrand@gmail.com
    File: Toastr init js
    */

    $(function () {
        var i = -1;
        var $toastlast;

        var getMessage = function getMessage() {
            var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!', '<div><input class="input-small form-control form-control-sm mb-2" placeholder="textbox"/>&nbsp;<a href="" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary mt-2">Close me</button><button type="button" id="surpriseBtn" class="btn text-white  mt-2" style="margin: 0 8px 0 8px">Surprise me</button></div>', 'Are you the six fingered man?', 'Inconceivable!', 'I do not think that means what you think it means.', 'Have fun storming the castle!'];
            i++;

            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };

        var getMessageWithClearButton = function getMessageWithClearButton(msg) {
            msg = msg ? msg : 'Clear itself?';
            msg += '<br /><br /><button type="button" class="btn-primary btn clear">Yes</button>';
            return msg;
        };

        $('#closeButton').click(function () {
            if ($(this).is(':checked')) {
                $('#addBehaviorOnToastCloseClick').prop('disabled', false);
            } else {
                $('#addBehaviorOnToastCloseClick').prop('disabled', true);
                $('#addBehaviorOnToastCloseClick').prop('checked', false);
            }
        });

        $('#showtoast').click(function () {
        });

        function getLastToast() {
            return $toastlast;
        }

        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    });
    /******/
})()
;
