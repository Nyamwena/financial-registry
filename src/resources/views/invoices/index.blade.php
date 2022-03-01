@extends('layouts.main')

@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
      Pending Invoices
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Point of Sale</button>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="intro-y col-span-6 lg:col-span-12">
        <!-- BEGIN: Form Layout -->



        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <h1></h1>
            <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                <caption class="text-2xl text-green-600">Pending Invoices</caption>
                <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">Invoice #</th>
                    <th class="border-b-2 whitespace-no-wrap">Customer Account</th>
                    <th class="border-b-2 whitespace-no-wrap">Service</th>
                    <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $invoice_hdr as $invoice)
                <tr>

                    <td class=" border-b">
                      {{$invoice->fl_invoice_number}}
                    </td>
                    <td class=" border-b">
                        {{$invoice->fl_practitioner_code}}
                    </td>
                    <td class=" border-b">

                        {{$invoice->fl_invoice_number}}
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3 edit" href="{{route('invoice.process',$invoice->fl_invoice_number)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                Process Invoice
                            </a>
                            <br>
                        </div>
                    </td>




                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- END: Form Layout -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
