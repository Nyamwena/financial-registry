@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-2 gap-6 mt-5">



        <div class="intro-y col-span-3 lg:col-span-6">
            <!-- BEGIN: Form Layout -->



            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-3" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Payment Plans</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Payment Plan Ref</th>
                        <th class="border-b-2 whitespace-no-wrap">Date Requested</th>
                        <th class="border-b-2 whitespace-no-wrap">Customer Number</th>
                        <th class="border-b-2 whitespace-no-wrap">Recommendations</th>
                        <th class="border-b-2 whitespace-no-wrap">Plan Amount</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payment_plans as $payment_plan)
                        <tr>

                            <td class=" border-b">

                                {{$payment_plan->fl_payment_plan_ref}}

                            </td>
                            <td class=" border-b">

                                {{$payment_plan->fl_request_date}}

                            </td>
                            <td class=" border-b">


                                {{$payment_plan->fl_customer_number}}
                            </td>


                            <td class=" border-b">
                                @if($payment_plan->fl_recommended_a != null )
                                    By: {{$payment_plan->fl_recommended_a}} <br>
                                    On: {{$payment_plan->fl_date_recommended_a}} <br>
                                @endif

                                @if($payment_plan->fl_recommended_b != null)
                                    By: {{$payment_plan->fl_recommended_b}} <br>
                                        On: {{$payment_plan->fl_date_recommended_b}}
                                    @endif

                            </td>

                            <td class=" border-b">
                                {{$payment_plan->fl_plan_amount}}

                            </td>


                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 edit" href="#" data-toggle="modal"
                                       data-target="#edit_payment_plan"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                      Recommend
                                    </a>
                                    <br>
                                </div>
                            </td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal" id="edit_payment_plan">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Are you sure you want to recommend
                    </h2>
                </div>

                <form action="{{route('payment-plan.recommend-store')}}" id="form-payment_plan" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-6 sm:col-span-4">

                                <input type="hidden" class="input w-full border flex-1" placeholder="0" id="recommend_id"  name="reco_id" required>
                                <span id="error_code"></span>
                            </div>
                        </div>

                        {{--                        <input type="text" class="input w-full border flex-1" id="fl_payment_ref" name="fl_payment_ref">--}}
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">No</button>
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('js')

    <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('pos.live-search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#customer').html(data.customer_data);

                        console.log('Student data' , data.customer_data);
                        //console.log('---', data.total_data)
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                // console.log('great')
                var query = $(this).val();

                fetch_customer_data(query);
            });
        });
    </script>


    <script>


        $(document).ready(function () {

            var table =  $("#data-source-3").DataTable();

            table.on('click', '.edit', function(){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#recommend_id').val(data[0]);


                // $('#form-period-detail').attr('action', 'account-period/close-open/period/'+data[0]);
                // $('#open-close-modal').modal('show');
            })

        })
    </script>

@endsection
