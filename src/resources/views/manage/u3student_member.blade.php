@extends('layouts.main')

@section('content')

    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base"></div>

                    <div class="intro-y box p-8">


                        <div>

                            <span class="text-sm px-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button justify-center block bg-theme-1 text-white ml-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Import All Students
                                 </a>
                            </span>

                        </div>


                    </div>

                </div>


            </div>
        </div>

        <div class="col-span-12 lg:col-span-12">

            <div class="pos__ticket box p-2 mt-5" >
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <h1></h1>
                    <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                        <caption class="text-2xl text-green-600">customer  list</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Student Number</th>
                            <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Email</th>
                            <th class="border-b-2 whitespace-no-wrap">Mobile</th>
                            <th class="border-b-2 whitespace-no-wrap">Action</th>
                        </tr>
                        </thead>
                        <tbody >


                        @foreach($students as $customer)
                            <tr class="cursor-pointer">
                                <td>{{$customer->studentNumber}}</td>
                                <td>{{$customer->title}} {{'.'}} {{ " " }} {{$customer->lastName}}{{ " " }} {{$customer->firstName}}  </td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobileNumber}}

                                </td>
                                <td>
                                   Import
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END: Ticket -->
    </div>
    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">
            <form action="{{route('import.student-member.post')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-span-12 sm:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">Are you sure you want to import all  students</h2>
                    </div>
                    <div class="col-span-12 sm:col-span-6" style="display: none">
                        @foreach($students as $person)
                            <input type="hidden" value="{{$person->firstName}}" name="first_name[]">
                            <input type="hidden" value="{{$person->lastName}}" name="last_name[]">
                            <input type="hidden" value="{{$person->middleName}}" name="middlename[]">
                            <input type="hidden" value="{{$person->sex}}" name="sex[]">
                            <input type="hidden" value="{{$person->title}}" name="title[]">
                            <input type="hidden" value="{{$person->mobileNumber}}" name="mobile_number[]">
                            <input type="hidden" value="{{$person->physicalAddress1}}" name="address[]">
                            <input type="hidden" value="{{$person->email}}" name="email[]">
                            <input type="hidden" value="{{$person->applicationNumber}}" name="application_number[]">
                            <input type="hidden" value="{{$person->studentNumber}}" name="student_number[]">
                        @endforeach
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-auto bg-theme-1 text-white">Import Students</button>
                </div>
            </form>
        </div>
    </div>
@endsection
