@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('institute.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Registration code</div>
                                <input type="text" class="input w-full border flex-1" name="fl_registration_code"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Institution Shortname</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_institution_shortname"  required>
                                <span id="error_code"></span>
                            </div>



                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Institution Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_institution_name" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Physical Address 1</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_pysicaladd1" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Physical Address 2</div>
                                <input type="text" class="input w-full border flex-1" name="fl_pysicaladd2"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Physical Address 3</div>
                                <input type="text" class="input w-full border flex-1"  name="fl_pysicaladd3" required>
                                <span id="error_code"></span>

                            </div>


                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Mailing Address 1</div>
                                <input type="text" class="input w-full border flex-1" placeholder="" name="fl_mailadd1"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Mailing Address 2</div>
                                <input type="text" class="input w-full border flex-1" name="fl_mailadd2"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Mailing Address 3</div>
                                <input type="text" class="input w-full border flex-1" name="fl_mailadd3"  required>
                                <span id="error_code"></span>

                            </div>



                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Telephone Number</div>
                                <input type="tel" class="input w-full border flex-1" placeholder="" name="fl_telephone"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Mobile Number</div>
                                <input type="tel" class="input w-full border flex-1" name="fl_mobilenumber" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Fax Number</div>
                                <input type="text" class="input w-full border flex-1"  name="fl_faxnumber" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Email</div>
                                <input type="email" class="input w-full border flex-1" name="fl_email"  required>
                                <span id="error_code"></span>

                            </div>





                            {{--                            make the system fill in automatical pick location based on location--}}
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Longitude</div>
                                <input type="text" class="input w-full border flex-1" name="fl_gps_longitude" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Latitude</div>
                                <input type="text" class="input w-full border flex-1" name="fl_gps_latitude" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Website Url</div>
                                <input type="text" class="input w-full border flex-1" name="fl_url" required>
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
@endsection
