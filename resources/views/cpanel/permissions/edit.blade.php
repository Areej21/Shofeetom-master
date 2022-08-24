@extends('cpanel.cpanel')

@section('page-title', 'Update Permission')

@section('styles')
@endsection

@section('page-content')
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل بيانــات الصلاحيـــة</h4>
                </div>
                @if ($errors->any())
                    <div class="card-body">
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">أخطاء تعديل الصلاحية</h4>
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
                @if (session('code') == 200)
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
                <div class="card-body">
                    <form class="form form-horizontal"
                        action="{{ route('permissions.update', Crypt::encrypt($permission->id)) }}" method="POSt">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-1" style="display: none;">
                                <label class="form-label" for="id">رقم الصلاحيـــة</label>
                                <input type="text" class="form-control dt-full-name" id="id"
                                    placeholder="أدخل رقم الصلاحية" name="id" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2"
                                    value="{{ Crypt::encrypt($permission->id) }}">
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="name">إسم الصلاحية</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ $permission->name }}"
                                            @error('name') style="border-color: red;" @enderror
                                            placeholder="أدخل اسم الصلاحية">
                                        @error('name')
                                            <small class="wrong-msg">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="for_guard">تعيين لـِ</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="for_guard" id="for_guard"
                                            @error('for_guard') style="border-color: red;" @enderror>
                                            <option value="0">*</option>
                                            <option value="admin" @if ($permission->guard_name == 'admin') selected @endif>
                                                أدمـــــن</option>
                                        </select>
                                        @error('for_guard')
                                            <small class="wrong-msg">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="active" id="active"
                                            @if ($permission->active) checked @endif>
                                        <label class="form-check-label" for="active">فعالة</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">تعديل</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">إلغاء</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات تفصيلة حول <strong> الصلاحيـــات</strong></h4>
                </div>
                <div class="card-body pb-1">
                    <p class="card-text">
                        في هذا الجــــدول سيتم استعراض بيانات تفصيلية حول الصلاحيات التي تم إنشاءها وحذفها وتعديلها
                        وإستخدمها
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>البيانات</th>
                                <th>العدد</th>
                                <th>المعدل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h6>الصلاحيات</h6>
                                </td>
                                <td>{{ $permission_count }}</td>
                                <td>{{ '%' . number_format($permission_count_avg, 2) }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>الصلاحيـــات المحذوفة</h6>
                                </td>
                                <td>{{ $deleted_permission_count }}</td>
                                <td>{{ '%' . number_format($deleted_permission_count_avg, 2) }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>صلاحيـــات قابلة للإستخدام</h6>
                                </td>
                                <td>{{ $active_permissions }}</td>
                                <td>{{ '%' . number_format($active_permissions_avg, 2) }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>صلاحيـــات غير قابلة للإستخدام</h6>
                                </td>
                                <td>{{ $inactive_permissions }}</td>
                                <td>{{ '%' . number_format($inactive_permissions_avg, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
