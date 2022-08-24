@extends('cpanel.cpanel')

@section('page-title', 'Create Permission')

@section('styles')
    <style>
        .wrong-field {
            border-color: red !important;
        }

        .wrong-msg {
            color: red;
        }
    </style>
@endsection

@section('page-content')
                            {{-- create Form --}}
<div class="col-md-6 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">إنشاء دور جديد</h4>
        </div>
                                        <div class="card-body">
            <form class="form form-horizontal" action="http://127.0.0.1:8000/shofeetom/cpanel/permissions" method="POSt">
                <input type="hidden" name="_token" value="puu2siiCqR81fnEIim3XDnYjHIukzCbU0EKsehfm">                        <div class="row">
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="name">إسم الدور</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" id="name" class="form-control" name="name" value="" placeholder="أدخل اسم الدور">
                                                                    </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="for_guard">تعيين لـِ</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-select" name="for_guard" id="for_guard">
                                    <option value="0">*</option>
                                    <option value="admin">أدمـــــن</option>
                                </select>
                                                                    </div>
                        </div>
                    </div>
                    <div class="col-sm-9 offset-sm-3">
                        <div class="mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="active" id="active" checked="">
                                <label class="form-check-label" for="active">فعالة</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">إنشاء</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect">إلغاء</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
                                {{-- cen create form --}}
  
@endsection

@section('scripts')

@endsection
