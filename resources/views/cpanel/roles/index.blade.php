@extends('cpanel.cpanel')

@section('page-title', 'Roles Index')

@section('styles')

@endsection

@section('page-content')
{{-- <div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Roles</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
                    can use any example of below table for your table and it can be use with any type of bootstrap tables.
                </p>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Role_id</th>
                            <th>Name</th>
                            <th>Grade_name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role )
                        <tr>
                        <td>{{$role->id}} </td>
                        <td>{{$role->name}} </td>
                        <td>{{$role->grade_name}} </td>
                        <td>{{$role->created_at}} </td>
                        <td>{{$role->updated_at}} </td>    
                    
                            <td>
                                
                            </td>
                            <td> </td>
                            <td>
                              
                            </td>
                            <td> </td>
                            <td>
                              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')

@endsection
