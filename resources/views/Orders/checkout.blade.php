    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @include('layouts.navigation')
    <x-app-layout>

        <x-slot name="header">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-3xl font-semibold ">Your Cart</h1>
                </div>

            </div>


        </x-slot>
        <x-auth-session-status class="mb-4" :status="session(['status'])" />

        <div class="flex-grow text-gray-800">

            <main class="p-6 sm:p-10 space-y-6">
                <div class="w-full h-screen bg-gray-100">
                    <!-- component -->
                    <div class="bg-gray-100 h-screen">
                        <div class="bg-white p-6  md:mx-auto">
                            {{-- <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                                <path fill="currentColor"
                                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                                </path>
                            </svg> --}}
                            <div class="container mx-auto flex px-5 items-center justify-center flex-col">
                                <img class="lg:w-2/6 md:w-3/6 w-5/6  object-cover object-center rounded" alt="hero"
                                    src="{{ url('asset/logo.png') }}">
                            </div>
                            <div class="text-center">
                                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Choose your
                                    payment method!
                                </h3>
                                <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
                                <p> Have a great day! </p>
                                <div class="py-10 text-center">
                                    <button id="pay-button"
                                        class=" bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3 px-5">
                                        PAY NOW!
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main>
        </div>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("payment success!");
                        window.location.href = "{{ route('product.index') }}";
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
    </x-app-layout>
