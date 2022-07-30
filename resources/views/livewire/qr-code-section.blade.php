{{-- Do your work, then step back. -LIVEWIRE --}}

<div class="object-cover rounded-lg bg-containerColor outline-slate-400 drop-shadow-2xl" id="qrCodeCard">
    <div class="p-2 px-10 py-4 text-right rounded-lg bg-slate-300 md:px-10 border-slate-400">
        <h1 class="pt-3 text-4xl font-bold text-center text-black underline font-robotoBold">Employee's QR Code</h1>
    </div>
    <div class="flex items-center justify-center px-5 py-2 text-center md:px-10 md:py-2">
        {!! $qrCode !!}
        <p class="px-3 mx-2 font-robotoBold">
            Employee's Name :
            <span class="font-bold font-italic">
                {{ $employeeName->firstname }} {{ $employeeName->middlename }} {{ $employeeName->lastname }}
            </span> <br><br>
            <span>Scan me to redirect to view the Employee's Information</span>
        </p>
    </div>
</div>
