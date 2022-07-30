{{-- If your happiness depends on money, you will never be happy with yourself. -LIVEWIRE --}}

<div class="relative w-full md:mx-auto">
    {{-- AT THE TOP OF BACKGROUND IMAGE --}}
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-90 text-7xl"></div>
    {{-- CONTAINER --}}
    <div class="absolute items-center justify-center object-cover w-full px-5 pt-40 pb-5 md:pt-52 md:px-10">
        {{-- SEPARATE FILE FOR DOWNLOAD PURPOSES --}}
        @include('livewire.qr-code-section')
    </div>
    {{-- <div class="absolute mx-36 md:mx-64 md:mt-40 mt-28">
        <input type="submit" name="download" id="download" class="px-2 py-2 font-bold text-white rounded-md cursor-pointer bg-primary hover:bg-secondary font-robotoBold" value="Download QR Code">
    </div> --}}
    {{-- BACKGROUND IMAGE --}}
    <img src="{{ asset('img/chall_bg7.jpg') }}" alt="City_Hall_Logo" class="object-cover max-h-screen max-w-screen" width="100%">
</div>


