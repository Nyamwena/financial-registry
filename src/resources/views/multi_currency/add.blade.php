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
    </div>
    @include('sweetalert::alert')
@endsection

