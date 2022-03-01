@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('inventory-service.create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">


                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Description</div>
                                <input type="text" name="fl_service_description" class="input w-full border flex-1" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">On hand quantity/ Service Capacity</div>
                                <input type="number" name="fl_on_hand" class="input w-full border flex-1" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">On order quantity/reserved service</div>
                                <input type="number" name="fl_on_order" class="input w-full border flex-1" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Unit Cost</div>
                                <input type="text" name="fl_unit_cost" class="input w-full border flex-1" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Retail Price</div>
                                <input type="number" name="fl_retail_price" class="input w-full border flex-1" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Service Destination</div>
                                <select name="fl_service_dest" class="input w-full border flex-1 select2"   id="">
                                    <option value="1">----Service Destination------</option>
                                    @foreach( $microservice as $micro)
                                        <option value="{{$micro->fl_service}}">
                                            {{$micro->fl_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Location</div>
                                <select name="fl_location_code" class="input w-full border flex-1 select2"   id="" >
                                    <option value="1">----SELECT LOCATION-----</option>
                                </select>
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

        <div class="intro-y col-span-6 lg:col-span-12">
            <!-- BEGIN: Form Layout -->



            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Products</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Item Description</th>
                        <th class="border-b-2 whitespace-no-wrap">Warehouse/Location</th>
                        <th class="border-b-2 whitespace-no-wrap">On Hand quantity/ Service Capacity</th>
                        <th class="border-b-2 whitespace-no-wrap">On Order Quantity/Reserved service</th>
                        <th class="border-b-2 whitespace-no-wrap">Available Quantity/Capacity</th>
                        <th class="border-b-2 whitespace-no-wrap">Unit Cost</th>
                        <th class="border-b-2 whitespace-no-wrap">Retail Price</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $service_inv  as $ser)
                    <tr>

                        <td class=" border-b">
                           {{$ser->fl_service_description}}

                        </td>
                        <td class=" border-b">
                            {{$ser->fl_location_code}}
                        </td>
                        <td class=" border-b">
                            {{$ser->fl_on_hand}}
                        </td>
                        <td class=" border-b">
                            {{$ser->fl_on_order}}
                        </td>
                        <td class=" border-b">
                            {{$ser->fl_available_qty}}
                        </td>
                        <td class=" border-b">
                            {{$ser->fl_unit_cost}}
                        </td>
                        <td class=" border-b">
                            {{$ser->fl_retail_price}}
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
    </div>
    @include('sweetalert::alert')
@endsection
