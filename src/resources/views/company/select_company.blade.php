@extends('layouts.main')

@section('content')
    <div class="intro-y col-span-12 lg:col-span-12" >
        <div class="grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                <div class="font-medium text-base">

                </div>

                <div >
                    <form action="{{route('select-company.get_session')}}" method="post">
                        @csrf

                        <select name="company_id" id="" class="select2 input input--lg box w-full lg:w-full mt-3 lg:mt-0 ml-auto col-12"  onchange="this.form.submit()">
                            <option value="" selected disabled>SELECT COMPANY</option>
                            @foreach($companies as $company)
                            <option value="{{$company->fl_system_code}}">{{$company->fl_institution_name}}</option>
                            @endforeach
                        </select>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
