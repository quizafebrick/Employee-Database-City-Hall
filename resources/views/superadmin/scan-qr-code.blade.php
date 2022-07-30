@include('superadmin.partial.header')

<div class="object-cover pb-5 rounded-lg drop-shadow-2xl ">
{{-- <h1>SCAN QR CODE</h1> --}}
    <div class="p-2 px-10 py-4 text-right rounded-t-lg md:px-10">
        <h1 class="pt-3 text-5xl underline font-bold text-center text-black font-robotoBold">Scan QR Code</h1>
    </div>
    <br>
    <div class="container md:mx-10 lg:mx-52 p-5">
        <div class="">
            <div id="reader"></div>
        </div>
    </div>
</div>

{{-- NAVBAR TOGGLE JS --}}
<script src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADING ANIMATION --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/error-message.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/success-message.js') }}"></script>
{{-- DROPDOWN --}}
<script src="{{ asset('js/dropdown-menu.js') }}"></script>

{{-- @include('superadmin.partial.footer') --}}

</body>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script>
function onScanSuccess(decodedText, decodedResult) {
    $('#result').val(decodedText);
    let employee_no = decodedText;
    html5QrcodeScanner.clear().then(_ => {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // THIS WILL REDIRECT WITH SIGNED ROUTE AND INCLUDED THE EMPLOYEE NO ALSO ON THE LINK
        location.href = `{{ URL::signedRoute('superadmin.scan-qrCode') }}&qr_code=${employee_no}`;
    }).catch(error => {
        alert('something wrong');
    });
}

function onScanFailure(error) {
// HANDLE SCAN FAILURE, USUALLY BETTER TO IGNORE AND KEEP SCANNING.
// FOR EXAMPLE:
    // console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
"reader",
{ fps: 30, qrbox: {width: 450, height: 450} },
/* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

</html>
