<div class="">
    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">Name</div>
            <input type="text" class="input w-full border flex-1 @error('name') is-invalid @enderror" placeholder=""
                   value="@isset($user) {{$user->name}} @endisset"
                   name="name" maxlength="50" minlength="2" required>

            @error('name')
            <div class="mb-2 text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">Surname</div>
            <input type="text" class="input w-full border flex-1 @error('surname') is-invalid @enderror" placeholder=""
                   value="{{old('surname')}} @isset($user) {{$user->surname}} @endisset"
                   name="surname" maxlength="50" minlength="2" required>
            @error('surname')
            <div class="mb-2 text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">ID Number</div>
            <input type="text" class="input w-full border flex-1 @error('idnumber') is-invalid @enderror" placeholder=""
                   value="{{old('idnumber')}} @isset($user) {{$user->idnumber}} @endisset"
                   name="idnumber" maxlength="50" minlength="2" required>
            @error('idnumber')
            <div class="mb-2 text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">email</div>
            <input type="text" class="input w-full border flex-1 @error('email') is-invalid @enderror" placeholder=""
                   value="{{old('email')}} @isset($user) {{$user->email}} @endisset"
                   name="email" maxlength="50" minlength="2" required>
            @error('email')
            <div class="mb-2 text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        @isset($create)
        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">password</div>
            <input type="password" class="input w-full border flex-1 @error('password') is-invalid @enderror" placeholder=""
                   value="{{old('password')}}"
                   name="password" maxlength="50" minlength="6" required>
            @error('password')
            <div class="mb-2 text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        @endisset

        <div class="intro-y col-span-12 sm:col-span-6">
            <div class="mb-2">Roles</div>
            <select name="roles" id="" class="input w-full border flex-1" required>
                <option value="">--select--</option>
                @if($roles != '')
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>


        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            <button type="reset" class="button w-24 justify-center block bg-gray-200 text-gray-600">Reset</button>
            <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save</button>
        </div>
    </div>
</div>
