@extends('cpanel.cpanel')

@section('page-title', 'الصلاحيـــات المحذوفة')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel-style/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('cpanel-style/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('cpanel-style/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('cpanel-style/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">

    @livewireStyles
@endsection

@section('page-content')
    @if ($errors->any())
        <div class="card-body">
            <div class="demo-spacing-0">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">أخطاء إسترجــاع الصلاحية</h4>
                    <div class="alert-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('code') == 2022)
        <div class="card-body">
            <div class="demo-spacing-0">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">رسالة نجاح</h4>
                    <div class="alert-body">
                        {{ session('msg') }}
                    </div>
                </div>
            </div>
        </div>
    @elseif (session('code') == 424)
        <div class="card-body">
            <div class="demo-spacing-0">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">رسالة فشل</h4>
                    <div class="alert-body">
                        {{ session('msg') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">

                    @livewire('permissions.crashed-permission-search')
                </div>
            </div>
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0" novalidate="novalidate"
                        action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">إضافة صلاحية</h5>
                        </div>
                        <div class="modal-body flex-grow-1">

                            <div class="mb-1">
                                <label class="form-label" for="name">اسم الصلاحية</label>
                                <input type="text" class="form-control dt-full-name" id="name"
                                    placeholder="أدخل اسم الصلاحية" name="name" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" value="{{ old('name') }}"
                                    @error('name') style="border-color: red;" @enderror>
                                @error('name')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-uname">تعيين لـــِ</label>
                                <select class="form-select" name="for_guard" id="for_guard"
                                    @error('for_guard') style="border-color: red;" @enderror>
                                    <option value="0">*</option>
                                    <option value="admin">أدمـــــن</option>
                                </select>
                                @error('for_guard')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <input type="checkbox" class="form-check-input" name="active" id="active" checked>
                                <label class="form-check-label" for="active">فعالة</label>
                            </div>
                            <button type="submit"
                                class="btn btn-primary me-1 data-submit waves-effect waves-float waves-light">إنشاء
                                الصلاحية</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect"
                                data-bs-dismiss="modal">إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        </div>
    @endsection

    @section('scripts')
        <script>
            function confirmDestroy(id, refrance) {
                Swal.fire({
                    title: 'هل أنت متأكد ؟',
                    text: 'لا يمكنك التراجع عن هذا التعديل, سيتم حذف الصلاحية بشكل نهائي',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم, احذف هذا!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        destoy(id, refrance);
                    }
                });
            }

            function destoy(id, refrance) {
                //  shofeetom/cpanel/permissions-archived/{id}/crashed/force-delete
                axios.delete('/shofeetom/cpanel/permissions-archived/' + id + '/crashed/force-delete/')
                    .then(function(response) {
                        // handle success
                        console.log(response);
                        refrance.closest('tr').remove();
                        showDeletingMessage(response.data);
                    })
                    .catch(function(error) {
                        // handle error
                        console.log(error);
                        showDeletingMessage(error.response.data);
                    })
                    .then(function() {
                        // always executed
                    });
            }

            function showDeletingMessage(data) {
                Swal.fire({
                    icon: data.icon,
                    title: data.title,
                    text: data.text,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        </script>

        @livewireScripts
    @endsection
