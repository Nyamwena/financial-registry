@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('monetary.currency-store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Currency Short Code</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_currency_shortcode" required>
                                <span id="error_code"></span>

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-8">
                                <div class="mb-2">Currency Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_currency_name" required>
                                <span id="error_code"></span>
                            </div>


                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Currency Symbol</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_currency_symbol" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Currency active</div>
                                <select name="fl_active" class="input w-full border flex-1"  id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
            <!-- END: Form Layout -->
        </div>


        <div class="intro-y col-span-6 lg:col-span-6">
            <!-- BEGIN: Form Layout -->



            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Multi Currency List</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Currency Code</th>
                        <th class="border-b-2 whitespace-no-wrap">Currency Name</th>
                        <th class="border-b-2 whitespace-no-wrap">Symbol</th>
                        <th class="border-b-2  whitespace-no-wrap">Active</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($currencies as $currency)
                        <tr>

                            <td class=" border-b">
                                {{$currency->fl_currency_code}}

                            </td>
                            <td class=" border-b">
                                {{$currency->fl_currency_name}}

                            </td>
                            <td class=" border-b">

                                    {{$currency->fl_currency_symbol}}


                            </td>
                            <td class=" border-b">
                                    @if($currency->fl_active == 1)
                                        Yes
                                    @elseif($currency->fl_active == 0)
                                        No
                                    @endif

                            </td>

                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 edit" href="#" data-toggle="modal"
                                       data-target="#edit_currency"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
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
        <div class="modal" id="edit_currency">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">

                    </h2>
                </div>

                <form action="{{route('monetary.currency-edit')}}" id="form-currency" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Currency Short Code</div>
                                <input type="text" class="input w-full border flex-1" placeholder="" id="fl_currency_shortcode"  name="fl_currency_shortcode" required>
                                <span id="error_code"></span>

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Currency Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder="" id="fl_currency_name"  name="fl_currency_name" required>
                                <span id="error_code"></span>
                            </div>


                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Currency Symbol</div>
                                <input type="text" class="input w-full border flex-1" placeholder="" id="fl_currency_symbol"  name="fl_currency_symbol" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Currency active</div>
                                <select name="fl_active" class="input w-full border flex-1"  id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span id="error_code"></span>

                            </div>

                        </div>

                        <input type="text" class="input w-full border flex-1" id="fl_currency_code" name="fl_currency_code">
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            var table =  $("#data-source-1").DataTable();
            table.on('click', '.edit', function(){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#fl_currency_code').val(data[0]);
                $('#fl_currency_symbol').val(data[2]);
                $('#fl_currency_name').val(data[1]);
             //   $('#fl_currency_shortcode').val(data[0]);

                $('#form-currency').attr('action', '../monetary/currency/edit/');
                $('#edit_currency').modal('show');
            })

        })
    </script>
@endsection
