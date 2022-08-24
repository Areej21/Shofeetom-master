<div>
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
            {{-- Close your eyes. Count to one. That is how long forever feels. --}}
            <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="dataTables_length" id="DataTables_Table_0_length"><label>عرض
                        <select wire:model="permissions_count" name="DataTables_Table_0_length"
                            aria-controls="DataTables_Table_0" class="form-select">
                            @if ($permissions_count <= 15)
                                <option value="15">15</option>
                            @else
                                @for ($i = 1; $i <= $permissions_count; ++$i)
                                    @if ($i % 15 == 0)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @elseif ($i + 1 > $permissions_count)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                            @endif
                        </select>
                        إدخالات
                    </label>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0">
                <div
                    class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1">
                    <div class="me-1">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>بحث:<input type="search"
                                    wire:model="searchTerm" class="form-control" placeholder=""
                                    aria-controls="DataTables_Table_0"></label>
                        </div>
                    </div>
                    <div class="dt-buttons btn-group flex-wrap"><button class="btn add-new btn-primary mt-50"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                            data-bs-target="#modals-slide-in"><span>إضافة صلاحية جديدة</span></button> </div>
                </div>
            </div>
        </div>
        <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
            aria-describedby="DataTables_Table_0_info">
            <thead class="table-light">
                <tr role="row">
                    <th class="control sorting_disabled" rowspan="1" colspan="1"
                        style="width: 69.7969px; display: none;" aria-label=""></th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 143.844px;" aria-label="User: activate to sort column ascending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 143.844px;" aria-label="User: activate to sort column ascending">إسم الصلاحية</th>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                        colspan="1" style="width: 155.828px;" aria-sort="descending"
                        aria-label="Email: activate to sort column ascending">عُيينت لـِ</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 143.844px;" aria-label="Role: activate to sort column ascending">تـــاريخ الانشاء
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 142.062px;" aria-label="Plan: activate to sort column ascending">عُدلت فــي</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                        style="width: 180.781px;" aria-label="Status: activate to sort column ascending">الإعدادات</th>
                </tr>
            </thead>
            <tbody>
                @if (count($permissions) == 0)
                    <tr class="odd">
                        <td valign="top" colspan="6" class="dataTables_empty">لم يتم العثور على بيانات بعد
                            ...
                        </td>
                    </tr>
                @endif
                @php
                    $counter = 1;
                @endphp

                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at->diffForHumans() }}</td>
                        <td>{{ $permission->updated_at->diffForHumans() }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{ route('permissions.edit', Crypt::encrypt($permission->id)) }}"
                                    class="btn btn-outline-primary waves-effect"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z">
                                        </path>
                                    </svg></a>
                                <button type="button"
                                    onclick="confirmDestroy('{{ Crypt::encrypt($permission->id) }}', this)"
                                    class="btn btn-outline-danger waves-effect"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tr class="odd" wire:loading>
                <td valign="top" colspan="6" class="dataTables_empty">يبحث عن بيانات ...</td>
            </tr>
        </table>
    </div>
</div>
</div>
