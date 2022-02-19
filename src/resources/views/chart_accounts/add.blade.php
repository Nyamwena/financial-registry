@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('chart.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-5">
                                <div class="mb-2">Account Number</div>
                                <input type="text" class="input w-full border flex-1" name="fl_account_num"  required>
                                @error('fl_account_num')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-5">
                                <div class="mb-2">Account Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_account_name"  required>
                                @error('fl_account_name')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror
                            </div>



                            <div class="intro-y col-span-12 sm:col-span-2">
                                <div class="mb-2">Account Main Type</div>
                                <select name="fl_account_main_type" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_type as $type)
                                        <option value="{{$type->fl_acc_type_code}}">{{$type->fl_account_type_name}}</option>
                                    @endforeach

                                </select>
                                @error('fl_account_main_type')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Account Subtype-A</div>
                                <select name="fl_account_sub_type_a" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_type as $type)
                                        <option value="{{$type->fl_acc_type_code}}">{{$type->fl_account_type_name}}</option>
                                    @endforeach
                                </select>
                                @error('fl_account_sub_type_a')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Account Subtype-B</div>
                                <select name="fl_account_sub_type_b" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_type as $type)
                                        <option value="{{$type->fl_acc_type_code}}">{{$type->fl_account_type_name}}</option>
                                    @endforeach
                                </select>

                                @error('fl_account_sub_type_b')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Is It Bank?</div>
                                <select name="fl_account_bank" class="input w-full border flex-1"  id="" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('fl_account_bank')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror

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
    @include('sweetalert::alert')
@endsection

