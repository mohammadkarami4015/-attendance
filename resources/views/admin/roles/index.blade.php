@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <div class="box-body">
                <div class="row">

                    <form role="form" method="post" action="{{route('roles.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 col-sm-offset-0 ">عنوان نقش</label>
                                    <input type="text" class="form-control col-sm-12 col-sm-offset-0" id="name" placeholder="عنوان نقش" name="title">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="save" name="save">افزودن</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th class="text-danger col-sm-1">ردیف</th>
                    <th class="text-danger col-sm-5">عنوان نقش</th>
                    <th class="text-danger"> تنظیمات</th>
                </tr>
                </tbody>
                <tbody id="roles">
                @foreach($roles as $role)
                    <tr>
                        <td>{{$index}}</td>
                        <td>
                           {{$role->title}}
                        </td>
                        <td>
                            <form onsubmit="return confirm('آیا مایل به حذف این نقش هستید؟');"
                                  method="POST" action="{{route('roles.destroy',$role)}}">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <a href="{{route('roles.show',$role)}}" class="btn btn-primary btn-sm" id="edit" >جزییات</a>
                                <button type="submit" class="btn btn-danger btn-sm" id="delete" name="delete">حذف</button>
                            </form>
                        </td>
                    </tr>
                    <input type="hidden" {{$index+=1}}>
                @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

@endsection
