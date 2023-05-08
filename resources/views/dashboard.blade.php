<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>



    <section style="margin: 50px 0">
        <div class="container  my-12 mx-auto px-4 md:px-12">
            <div class="lg:flex-wrap sm:flex justify-between -mx-1 lg:-mx-4">

                <!-- Column -->
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg text-black">
                                Account Balance
                            </h1>
                            <p class=" text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-800">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                </svg>
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            @foreach ($transaction as $transactions)
                                @if ($transactions['status'] == 'pending')
                                    <h6 class="ml-2 text-sm text-black">$0.00</h5>
                                    @else
                                    <h6 class="ml-2 text-sm text-black">${{  $transactions->amount }}</h5>
                                @endif
                            @endforeach
                        </footer>

                    </article>
                    <!-- END Article -->
                    <!-- Column -->
                    {{-- action="{{ route('payment.callback') }}" --}}


                        <form id="paymentForm" method="post" action="{{ route('coingate.redirect') }}" class="space-y-6">
                            @csrf
                            <div class="mt-10 sm:mx-auto sm:w-full py-10 sm:max-w-sm overflow-hidden shadow-slate-400 rounded-lg shadow-lg px-2">
                                <div class="text-center">
                                    <h2 class="text-indigo-600 text-4xl">Make Payment</h2>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                               <input type="hidden" name="currency" value="NGN">
                               <input type="hidden" name="user_id" value="{{  auth()->user()->id }}">
                                <div>
                                    <label for="amount" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                    <div class="mt-2">
                                        <input id="amount" name="amount" type="text" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <input type="submit" value="Pay"
                                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                </div>
                            </div>
                        </form>

                    <!-- END Column -->
                </div>
                <!-- END Column -->
                {{-- <div class="container mx-auto px-4 sm:px-8"> --}}
                <div class="py-8">
                    <div>
                        <h2 class="text-2xl font-semibold leading-tight">Transaction History</h2>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <!---- <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            Client / Invoice
                                        </th> -->
                                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            Transaction Id
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            Amount
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            Issued
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($transaction) != 0)
                                        @foreach ($transaction as $transactions)
                                            <tr>
                                                <!--<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            <img class="w-full h-full rounded-full"
                                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                                alt="" />
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                Molly Sanders
                                                            </p>
                                                            <p class="text-gray-600 whitespace-no-wrap">000004</p>
                                                        </div>
                                                    </div>
                                                </td> -->
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{  $loop->index + 1  }}</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">${{  $transactions->amount }}</p>
                                                    {{-- <p class="text-gray-600 whitespace-no-wrap">USD</p> --}}
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{  $transactions->created_at->diffforHumans() }}</p>
                                                    {{-- <p class="text-gray-600 whitespace-no-wrap">Due in 3 days</p> --}}
                                                </td>
                                                @if ($transactions['status'] == 'pending')
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">Pending</span>
                                                        </span>
                                                    </td>
                                                    @else
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">Paid</span>
                                                        </span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}

            </div>

        </div>
        </div>
    </section>



{{-- @include('layouts.script') --}}


</x-app-layout>
