@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('fees.create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Fees Group Description</div>
                                <input type="text"  class="input w-full border flex-1" name="fl_description" required>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Faculty/Department Code</div>
                                <select name="fl_major_code" class="input w-full border flex-1 select2"   id="" required>
                                    <option  disabled>----select faculty/department code------</option>
                                    @foreach($dept_code as $code)
                                        <option value="{{$code->id}}">{{$code->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Programme</div>
                                <select name="fl_minor_code1[]" class="input w-full border flex-1 select2"  multiple id="" >
                                    <option disabled>----select programme------</option>
                                    @foreach( $programme_code as $code)
                                        <option value="{{$code->programmeCode}}">{{$code->programmeName}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Intake Type</div>
                                <select name="fl_minor_code2" class="input w-full border flex-1 select2"  id="">
                                    <option value="1">----select intake type code------</option>
                                    @foreach( $intake_type as $code)
                                        <option value="{{$code->id}}">{{$code->long_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Session/Term</div>
                                <select name="fl_term_code" class="input w-full border flex-1 select2"   id="">
                                    <option disabled>----select session/term------</option>
                                    @foreach($session as $code)
                                        <option value="{{$code->id}}">{{$code->academic_session_name}}   {{'Year--->'}} {{$code->academic_year}}</option>
                                    @endforeach
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
                    <caption class="text-2xl text-green-600">Fees Group</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Description</th>
                        <th class="border-b-2 whitespace-no-wrap">Faculty</th>
                        <th class="border-b-2 whitespace-no-wrap">Programme</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($fees_grp  as $grp)
                    <tr>

                        <td class=" border-b">
                            {{$grp->fl_description}}
                        </td>
                        <td class=" border-b">
                            {{$grp->fl_major_code1}}
                        </td>
                        <td class=" border-b">
                            {{$grp->fl_minor_code1}}
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
