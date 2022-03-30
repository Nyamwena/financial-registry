@extends('layouts.main')

@section('content')
    <div class="intro-y col-span-12 lg:col-span-12" >
        <div class="grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                <div class="font-medium text-base">

                </div>

                <div >

                    <div class="intro-y datatable-wrapper box p-5 mt-5">
                        <h1></h1>
                        <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                            <caption class="text-2xl text-green-600"> SELECT FEES GROUP</caption>
                            <thead>
                            <tr>
                                <th class="border-b-2 whitespace-no-wrap">Group  ID</th>
                                <th class="border-b-2 whitespace-no-wrap">Group Description</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($fees_group as $group)
                                <tr class="">
                                    <td ><a href="{{route('invoice-billing.bill-one',$group->fl_feegroup_code )}}">{{$group->fl_feegroup_code}}</a></td>
                                    <td > <a href="{{route('invoice-billing.bill-one',$group->fl_feegroup_code )}}">{{$group->fl_description}}</a>   </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
