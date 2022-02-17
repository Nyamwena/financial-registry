@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('accounting_periods.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">


                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Period Code</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_period_code"  required>
                                <span id="error_code"></span>
                            </div>



                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Period Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_period_name" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Period Start Date</div>
                                <input type="date" class="input w-full border flex-1" placeholder=""  name="fl_date_a" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Period End Date</div>
                                <input type="date" class="input w-full border flex-1" placeholder=""  name="fl_date_z" required>
                                <span id="error_code"></span>

                            </div>



                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Closed</div>
                                <select name="fl_closed" class="input w-full border flex-1"  id="">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                                </select>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Archived</div>
                                <select name="fl_archived" class="input w-full border flex-1"  id="">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
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
    </div>

    <form action="{{route('acc_period_detail.store')}}" method="post">
        @csrf
        <div class="">
            <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                <div class="intro-y col-span-12 sm:col-span-3">
                    <div class="mb-2">Period Detail Name</div>
                    <input type="text" class="input w-full border flex-1" name="fl_period_det_name"  required>
                    <span id="error_code"></span>

                </div>

                <div class="intro-y col-span-12 sm:col-span-3">
                    <div class="mb-2">Start date</div>
                    <input type="date" class="input w-full border flex-1" placeholder="0" name="fl_dtl_date_a"  required>
                    <span id="error_code"></span>
                </div>



                <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">End Date</div>
                    <input type="date" class="input w-full border flex-1" placeholder="0"  name="fl_dtl_date_z" required>
                    <span id="error_code"></span>
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button type="reset" class="button w-24 justify-center block bg-red-200 text-gray-600">Reset</button>
                    <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save</button>
                </div>
            </div>
        </div>
    </form>

@endsection
