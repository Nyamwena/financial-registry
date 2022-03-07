@extends('layouts.app')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">

        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-6">
                <form action="{{route('admin.users.update', $user->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    @include('admin.partials.form')
                </form>
            </div>
            <!-- END: Form Layout -->


        </div>

    </div>
    @include('sweetalert::alert')


@endsection

@section('js')

@endsection
