@extends('cpanel.index')

@section('page-title', 'Shofeetom CPanel')

@section('styles')

@endsection

@section('nav-icons')
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center"
            href="#" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
            </svg><span data-i18n="User Interface">الأدوار والصلاحيات</span></a>
        <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown"
                data-i18n="Cards"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-credit-card">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                    </rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg><span data-i18n="Cards">الأدوار</span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                        href="{{route('roles.create')}}" data-bs-toggle="" data-i18n="Basic"><svg 
                        {{-- // route --}}
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span data-i18n="Basic">استعراض الوظائف</span></a>
                </li>
                <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                        href="" data-bs-toggle="" data-i18n="Basic"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span data-i18n="Basic">إنشاءوظيفة جديدة</span></a>
                </li>
               
            </ul>
        </li>
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                    class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown"
                    data-i18n="Cards"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                        </rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg><span data-i18n="Cards">الصلاحيات</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('permissions.index') }}" data-bs-toggle="" data-i18n="Basic"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span data-i18n="Basic">إستعراض الصلاحيات</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('permissions.create') }}" data-bs-toggle="" data-i18n="Basic"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span data-i18n="Basic">إنشاء صلاحية جديدة</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('crashed_permission.show') }}" data-bs-toggle="" data-i18n="Basic"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span data-i18n="Basic">الصلاحيات المحذوفة</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
@endsection

@section('page-content')

@endsection

@section('scripts')

@endsection
