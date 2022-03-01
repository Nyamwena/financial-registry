@extends('layouts.main')

@section('content')

    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base"></div>

                    <div class="intro-y box p-8">
                        <div  class='flex flex-row space-x-5 mt-1'>

                            <form method="POST" enctype ="multipart/form-data" action="{{route('import.upload')}}" class='w-full'>
                                @csrf

                                <div  class='w-full flex flex-row space-x-1'>
                                    <div class='w-1/2'>
                                        <label for="search_applicant" class="text-xs font-semibold px-1">File</label>
                                        <input type="file" class="w-full pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-300" id="upload_doc" name="upload_doc" required>
                                        @error("upload_doc")
                                        <span class="text-xs text-red-500">
        {{ $message }}
        </span>
                                        @enderror
                                    </div>
                                    <div  class='w-1/2 pl-10 m-6'>
                                        <button type="submit" class="button justify-center block bg-theme-1 text-white ml-2">Upload</button>
                                    </div>


                                </div>

                            </form>


                        </div>

                        <div>
                             <span class="text-sm px-2"><a href="{{asset('download/customer_upload.xlsx')}}" class="button justify-center block bg-theme-1 text-white ml-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>Download Sample File</a>
                   </span>

                            <span class="text-sm px-2"><a href="{{route('import.student-member')}}" class="button justify-center block bg-theme-6 text-white ml-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>Import Students From Registration Service</a>
                   </span>
                        </div>


                    </div>

                </div>


            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-12">

            <div class="pos__ticket box p-2 mt-5" >
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <h1></h1>
                    <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                        <caption class="text-2xl text-green-600">customer  list</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Customer Account</th>
                            <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Email</th>
                            <th class="border-b-2 whitespace-no-wrap">Contact</th>
                            <th class="border-b-2 whitespace-no-wrap">Action</th>
                        </tr>
                        </thead>
                        <tbody >


                        @foreach($customers as $customer)
                            <tr class="cursor-pointer">
                                <td>{{$customer->fl_consumer_account}}</td>
                                <td>{{$customer->fl_title}} {{'.'}} {{ " " }} {{$customer->fl_lastname}}{{ " " }} {{$customer->fl_firstname}}  </td>
                                <td>{{$customer->fl_email}}</td>
                                <td>Mobile#:  {{$customer->fl_mobile_number}}<br>
                                    Telephone#: {{$customer->fl_telephone}}
                                </td>
                                <td>
                                    View Transaction History
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
@endsection
