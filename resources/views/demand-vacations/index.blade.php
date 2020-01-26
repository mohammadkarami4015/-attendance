@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="personal_code">کد پرسنلی:</label>
                        <input type="text" name="personal_code" id="personal_code" class="form-control"
                               onkeyup="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="section_id">بخش</label>
                        <select type="text" name="section_id" id="section_id" class="form-control" onchange="">
                            <option value="" selected>همه بخش ها</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="orderBy">مرتب سازی بر اساس</label>
                        <select name="orderBy" id="orderBy" class="form-control" onchange="">
                            <option value="personal_code">شماره کارمندی</option>
                            <option value="last_name">نام خانوادگی</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th class="text-danger">شماره پرسنلی</th>
                    <th class="text-danger">نوع مجوز</th>
                    <th class="text-danger">نوع تردد</th>
                    <th class="text-danger">نوع مرخصی</th>
                    <th class="text-danger">از تاریخ</th>
                    <th class="text-danger">تا تاریخ</th>
                    <th class="text-danger">از زمان</th>
                    <th class="text-danger">تا زمان</th>
                    <th class="text-danger">  ویرایش | حذف</th>
                </tr>
                </tbody>
                <tbody id="users">
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="/users/{{$user->id}}">{{$user->name}}</a>
                        </td>
                        <td>{{$user->family}}</td>
                        <td>{{$user->personal_code}}</td>
                        <td>{{$user->namtional_code}}</td>
                        <td></td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form onsubmit="return confirm('آیا مایل به حذف این کاربر هستید؟');"
                                  method="POST" action="/users/{{$user->id}}">
                                {{csrf_field()}}
                                {{method_field('delete')}}

                                <a href="/users/edit/{{$user->id}}" class="btn btn-primary">ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

@endsection
