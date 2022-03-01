@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-6 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('account-period.create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Period Code</div>
                                <input type="text" class="input w-full border flex-1 "
                                       placeholder="" id="fl_period_code" name="fl_period_code" maxlength="20" minlength="3" required>

                                @error('fl_period_code')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Period Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder="" id="fl_period_name" name="fl_period_name" maxlength="20" minlength="3" required>
                                <span id="error_code"></span>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Start Date</div>
                                <input type="date" class="input w-full border flex-1 @error('fl_date_a') is-invalid @enderror" placeholder="" name="fl_date_a" required>
                                @error('fl_date_a')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">End Date</div>
                                <input type="date" class="input w-full border flex-1 @error('fl_date_z') is-invalid @enderror" placeholder="" name="fl_date_z" required>
                                @error('fl_date_z')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>

                            <input type="hidden" class="input w-full border flex-1" value="1"  name="fl_closed"  required>
                            <input type="hidden" class="input w-full border flex-1" value="0"  name="fl_archived"  required>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <button type="reset" class="button w-24 justify-center block bg-gray-200 text-gray-600">Reset</button>
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
                     <caption class="text-2xl text-green-600">Account Period Header</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Period Code</th>
                        <th class="border-b-2 whitespace-no-wrap">Period Name</th>
                        <th class="border-b-2  whitespace-no-wrap">Start Date</th>
                        <th class="border-b-2  whitespace-no-wrap">End Date</th>
                        <th class="border-b-2  whitespace-no-wrap">Closed</th>
                        <th class="border-b-2  whitespace-no-wrap">Archived</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($account_period as $period)
                       <tr>

                                    <td class=" border-b">
                                        {{$period->fl_period_code}}

                                    </td>
                                <td class=" border-b">
                                    <div class="">{{$period->fl_period_name}}</div>

                                </td>
                                <td class=" border-b">
                                    <a class="flex items-center mr-3" href="">
                                        {{$period->fl_date_a}}
                                    </a>
                                </td>
                                <td class=" border-b">
                                    <a class="flex items-center mr-3" href="">
                                        {{$period->fl_date_z}}
                                    </a>
                                </td>
                                <td class=" border-b">
                                    <a class="flex items-center mr-3" href="">
                                        @if($period->fl_closed == 1)
                                        Yes
                                        @elseif($period->fl_closed == 0)
                                            No
                                        @endif
                                    </a>
                                </td>
                                <td class=" border-b">
                                    <a class="flex items-center mr-3" href="">
                                        @if($period->fl_archived == 1)
                                            Yes
                                        @elseif($period->fl_archived == 0)
                                            No
                                        @endif
                                    </a>
                                </td>
                                <td class="border-b w-5">
                                    <div class="flex sm:justify-center items-center">
                                        <a class="flex items-center mr-3 edit" href="#" data-toggle="modal" data-target="#open-close-modal"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Open/close </a>
                                        <br>
                                        <a class="flex items-center mr-3" href="#" data-toggle="modal" data-target="#add-period-modal"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Add Period Details </a>

                                    </div>
                                </td>

                            </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END: Form Layout -->
        </div>

        <div class="modal" id="add-period-modal">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">

                    </h2>
                </div>

                <form action="{{route('account-period.detail-create')}}" id="form-period-detail" method="post">
                    @csrf
                    <div class="">
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-12">
                                <div class="mb-2">Period Header Name</div>
                                <select name="fl_period_code" class="input w-full border flex-1" id="" required>
                                    <option value="">---Select period header---</option>
                                    @foreach($account_period as $period)
                                        <option value="{{$period->fl_period_code}}">{{$period->fl_period_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Period Detail Name</div>
                                <input type="text" class="input w-full border flex-1"   name="fl_period_det_name"  required>

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Start Date</div>
                                <input type="date" class="input w-full border flex-1"  name="fl_dtl_date_a" required>
                                @error('fl_dtl_date_a')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">End Date</div>
                                <input type="date" class="input w-full border flex-1"  name="fl_dtl_date_z" required>
                                @error('fl_dtl_date_z')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                    </div>
                </form>


            </div>
        </div>

        <div class="modal" id="open-close-modal">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">

                    </h2>
                </div>

                <form action="{{route('account-period.close-open')}}" id="form-period-detail" method="post">
                    @csrf
                    <div class="">
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-12">
                                <div class="mb-2">Close/Open Account Period</div>
                                <select name="fl_closed" class="input w-full border flex-1" id="" required>
                                    <option value="">---Select an option---</option>
                                    <option value="1">Close</option>
                                    <option value="0">Open</option>
                                </select>
                            </div>

                        </div>

                        <input type="hidden" class="input w-full border flex-1" id="period_code_fl" name="fl_period_code">
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

                $('#period_code_fl').val(data[0]);


                $('#form-period-detail').attr('action', 'account-period/close-open/period/'+data[0]);
                $('#open-close-modal').modal('show');
            })

        })
    </script>
@endsection
