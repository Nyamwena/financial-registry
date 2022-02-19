@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('account-type.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Account Type Name</div>
                                <input type="text" class="input w-full border flex-1" name="fl_account_type_name"  required>
                                @error('fl_account_type_name')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Account Range Start</div>
                                <input type="number" class="input w-full border flex-1" placeholder="0" name="fl_account_range_a"  required>
                                @error('fl_account_range_a')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
                                @enderror
                            </div>



                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Account Range End</div>
                                <input type="number" class="input w-full border flex-1" placeholder="0"  name="fl_account_range_z" required>
                                @error('fl_account_range_z')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
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
