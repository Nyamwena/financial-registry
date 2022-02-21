<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="" class="w-6" src="">
        <span class="hidden xl:block text-white text-lg ml-3"> <span class="font-medium"></span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{url('/')}}" class="side-menu  @if(Request::is('/')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>


        <li>
            <a href="javascript:;" class="side-menu @if(Request::is('institute/*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Institute Details Setup<i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('institute.index')}}" class="side-menu @if(Request::routeIs('institute.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title"> Add Institute Details</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('institute.index')}}" class="side-menu @if(Request::routeIs('institute.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title"> Edit Institute Details</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;" class="side-menu @if(Request::is('fees/*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Fees Settings<i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('fees.index')}}" class="side-menu @if(Request::routeIs('fees.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title">Add Fees Group</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('fees.ordinance-index')}}" class="side-menu @if(Request::routeIs('fees.ordinance-index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title"> Add Fees Ordinance</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('fees.structure-index')}}" class="side-menu @if(Request::routeIs('fees.structure-index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title"> Add Fees Structure</div>
                    </a>
                </li>


            </ul>
        </li>


        <li class="side-nav__devider my-6"></li>

        <li>
            <a href="javascript:;" class="side-menu @if(Request::is('account/*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Accounts Settings <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">

                <li>
                    <a href="{{route('account-period.index')}}" class="side-menu @if(Request::routeIs('account-period.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Account Periods <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>


                <li>
                    <a href="{{route('center.index')}}" class="side-menu @if(Request::routeIs('center.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Responsibility Centres <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('account-period.index')}}" class="side-menu @if(Request::routeIs('account-period.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Account Periods <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>


                <li>
                    <a href="{{route('account-type.index')}}" class="side-menu @if(Request::routeIs('account-type.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Account Type <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('chart.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Chart of Accounts <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>


        <li>
            <a href="javascript:;" class="side-menu @if(Request::is('monetary/*')) side-menu--active @endif">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Monetary Settings <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('monetary.currency-index')}}" class="side-menu @if(Request::routeIs('monetary.currency-index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Currency Setup <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('monetary.exchange-index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Exchange Rate <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('monetary.payment-method-index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Payment Method<i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>


                <li>
                    <a href="{{route('account-type.index')}}" class="side-menu @if(Request::routeIs('account-type.index')) side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Account Type <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('chart.index')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Chart of Accounts <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="side-nav__devider my-6"></li>

            <li>
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="side-menu__title"> User  Management <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Add Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                    </li>

                </ul>
            </li>

    </ul>
</nav>
