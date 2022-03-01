@extends('layouts.main')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Fees Collection
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="javascript:;" data-toggle="modal" data-target="#new-order-modal" class="button text-white bg-theme-1 shadow-md mr-2">
                New
            </a>
            <div class="pos-dropdown dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="chevron-down"></i> </span>
                </button>
                <div class="pos-dropdown__dropdown-box dropdown-box mt-10 absolute top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Student</span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="lg:flex intro-y">
            </div>
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5">
                    <div class="font-medium text-base"></div>

                    <div class="intro-y box p-8">
                        <form action="{{route('invoice.remittance-post')}}" method="post">
                            @csrf
                            <div class="">
                                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                                    <div class="intro-y col-span-12 sm:col-span-8">
                                        <div class="mb-2">Customer Account</div>
                                        <input type="text" class="input w-full border flex-1" placeholder="" value="{{$invoice_hdr->fl_practitioner_code}}"  name="fl_consumer_account" readonly>
                                        <span id="error_code"></span>
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-4">
                                        <div class="mb-2">Remittance Amount</div>
                                        <input type="number" class="input w-full border flex-1" placeholder=" " name="fl_remittance_amount"  value="{{$invoice_hdr->fl_amount_due}}" required>
                                        <span id="error_code"></span>
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Value Date</div>
                                        <input type="date" class="input w-full border flex-1" placeholder=" " name="fl_value_date"  required>
                                        <span id="error_code"></span>
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Remittance Date</div>
                                        <input type="date" class="input w-full border flex-1" placeholder=" " name="fl_remittance_date"  required>
                                        <span id="error_code"></span>
                                    </div>

                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Invoice Number</div>
                                        <input type="text" class="input w-full border flex-1" value="{{$invoice_hdr->fl_invoice_number}}" placeholder=" " name="fl_invoice_number"  readonly>
                                        <span id="error_code"></span>
                                    </div>


                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Currency</div>
                                        <select name="fl_currency_code" class="input w-full border flex-1 select2"  id="">
                                            @foreach($currency as $cry)
                                            <option value="{{$cry->fl_currency_code}}">{{$cry->fl_currency_name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="error_code"></span>

                                    </div>

                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Payment Method</div>
                                        <select name="fl_payment_code" class="input w-full border flex-1 select2"  id="">
                                            @foreach($payment_method as $pm)
                                                <option value="{{$pm->fl_payment_code}}">{{$pm->fl_payment_descr}}</option>
                                            @endforeach
                                        </select>
                                        <span id="error_code"></span>

                                    </div>
                                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                        <button type="reset" class="button w-24 justify-center block bg-red-200 text-gray-600">Reset</button>
                                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y pr-1">
            </div>
            <div class="tab-content">
                <div class="tab-content__pane active" id="ticket">
                    <div class="pos__ticket box p-2 mt-5">
                        <a href="javascript:;" data-toggle="modal" data-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <div class="pos__ticket__item-name truncate mr-1">studendt</div>
                            <div class="text-gray-600">x 1</div>
                            <i data-feather="edit" class="w-4 h-4 text-gray-600 ml-2"></i>
                            <div class="ml-auto">$112</div>
                        </a>
                    </div>
                    <div class="box p-5 mt-5">
                        <div class="flex">
                            <div class="mr-auto">Subtotal</div>
                            <div>$250</div>
                        </div>
                        <div class="flex mt-4">
                            <div class="mr-auto">Discount</div>
                            <div class="text-theme-6">-$20</div>
                        </div>
                        <div class="flex mt-4">
                            <div class="mr-auto">Tax</div>
                            <div>15%</div>
                        </div>
                        <div class="flex mt-4 pt-4 border-t border-gray-200">
                            <div class="mr-auto font-medium text-base">Charge</div>
                            <div class="font-medium text-base">$220</div>
                        </div>
                    </div>
                    <div class="flex mt-5">
                        <button class="button w-32 border border-gray-400 text-gray-600">Clear Items</button>
                        <button class="button w-32 text-white bg-theme-1 shadow-md ml-auto">Charge</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- END: Ticket -->
    </div>

@endsection
