@extends('layouts.master')

@section('title')
    ورود و خروج
@endsection

@section('description')

@endsection

@section('content')
    <div class="col-md-10">

        <a href="{{route('timeSheets.create')}}" class="btn btn-primary">ثبت اطلاعات جدید</a>
        <div class="box">
            <input onkeyup="Search()" type="text" name="userSearch" id="userSearch" class="form-control col-md-3"
                   style="margin:1% 74% 1% 1%; "
                   placeholder="مشخصات کاربری ">
            <div class="box table-responsive no-padding ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>مشخصات کاربری</th>
                        <th>تاریخ</th>
                        <th>زمان</th>
                        <th> تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody id="ajax">
                    @foreach($timeSheets as $timeSheet)
                        <tr>
                            <td>
                                {{\App\Helpers\Name::userFullName($timeSheet->user)}}
                            </td>
                            <td>
                                {{\App\Helpers\DateFormat::toJalali($timeSheet->finger_print_time)->formatJalaliDate()}}
                            </td>

                            <td>
                                {{\App\Helpers\DateFormat::toJalali($timeSheet->finger_print_time)->formatTime()}}
                            </td>

                            <td>
                                <form onsubmit="return confirm('آیا مایل به حذف این اطلاعات می باشید؟');"
                                      method="post"
                                      action="{{route('timeSheets.destroy',$timeSheet->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <div class="btn-group btn-group">
                                        <a href="{{route('timeSheets.edit',$timeSheet->id)}}" class="btn btn-primary">ویرایش</a>
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-right: 40%">
                    {{$timeSheets->appends(request()->all())->links()}}
                </div>
            </div>


        </div>
    </div>

    <script>
        function Search() {
            var text = document.getElementById('userSearch').value;
            var url = '{{URL::asset('admin/timeSheetSearch')}}' + '?';
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('ajax').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", url + 'userSearch=' + text, true);
            xhttp.send();
        }
    </script>

@endsection