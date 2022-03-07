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
                <form action="{{route('admin.create.user')}}" method="post">
                    @csrf
                   @include('admin.partials.form', ['create' =>true])
                </form>
            </div>
            <!-- END: Form Layout -->


        </div>
        @if($users  != '')
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box datatable-wrapper col-span-12 overflow-auto lg:overflow-visible">
                    <h3>Awards</h3>
                    <table class="table table-report  display datatable w-full">
                        <thead>
                        <tr>
                            <th class="border-b-2 ">Name</th>
                            <th class="border-b-2 ">ID Number</th>
                            <th class="border-b-2 ">Role</th>
                            <th class="border-b-2 ">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users !=null)
                            @foreach( $users as $item)
                                <tr>
                                    <td class="link-primary">{{$item->name}} {{$item->surname}}</td>
                                    <td class="link-danger">{{$item->idnumber}}</td>
                                    <td class="link-danger">{{$item->roles->pluck('name')}}</td>
                                    <td class="border-b w-5">
                                        <div class="flex sm:justify-center items-center">
                                            <a class="flex items-center mr-3" href="{{route('admin.users.edit', $item->id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                            <button type="button" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$item->id}}').submit()"
                                                    class="flex items-center text-theme-6 show_confirm"
                                                    title='Delete'> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                                Delete
                                            </button>
                                            <form method="POST" id="delete-user-form-{{$item->id}}" action="{{ route('admin.users.destroy', $item->id) }}" style="display: none">
                                                @csrf
                                               @method("DELETE")

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div> 
                <!-- END: Form Layout -->


            </div>

        @endif
    </div>
    @include('sweetalert::alert')


@endsection

@section('js')

@endsection
