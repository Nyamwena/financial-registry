@extends('layouts.main')


@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

        <a href="{{route('account-period.index')}}"  class="button text-white bg-theme-1 shadow-md mr-2">
           Account Period
        </a>
    </div>
    <div class="intro-y col-span-6 lg:col-span-12">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <h1></h1>
            <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                <caption class="text-2xl text-green-600">Account Period Detail</caption>
                <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">Account Period Detail Name</th>
                    <th class="border-b-2  whitespace-no-wrap">Start Date</th>
                    <th class="border-b-2  whitespace-no-wrap">End Date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($period_det as $period)
                    <tr>

                        <td class=" border-b">
                            {{$period->fl_period_det_name}}

                        </td>
                        <td class=" border-b">
                            <a class="flex items-center mr-3" href="">
                                {{$period->fl_dtl_date_a}}
                            </a>
                        </td>
                        <td class=" border-b">
                            <a class="flex items-center mr-3" href="">
                                {{$period->fl_dtl_date_z}}
                            </a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- END: Form Layout -->
    </div>
@endsection
