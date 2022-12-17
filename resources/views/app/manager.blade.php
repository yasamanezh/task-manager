@extends('layouts.master')
@section('title','تسک های ارسال برای تایید')
@section('body')
<div class="bg-white" style="direction: rtl;padding: 30px">
    <h3>تسک های ارسال برای تایید</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="table ">
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">تاریخ</th>
                    <th scope="col">تغییر کاربر</th>
                    <th scope="col">تغییر وضعیت</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                  <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{ $now->greaterThan($task->exp_date) ? 'زمان انجام به پایان رسیده':$task->exp_date }}</td>
                     <td>
                         <form action="{{route('taskManager')}}" method="POST">
                             @csrf
                             <input name='id' value="{{$task->id}}" type="hidden">
                            @foreach($users as $user)
                              <select name='user_id'>
                                  <option value=''>انتخاب</option>
                                  <option value="{{$user->id}}">{{$user->name}} </option> 
                              </select>
                            @endforeach
                            <button type="submit" class="btn btn-secondary text-gray-700" >تغییر</button>
                         </form>
                     
                     </td>
                     <td>
                         <a href="{{route('changeStatus',$task->id)}}" class="btn {{$task->status == 0 ? 'btn-danger' : 'btn-success'}}">{{$task->status == 0 ? 'غیر فعال' : 'فعال'}}</a>
                     </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
        </div>
    </div>

</div>
@endsection
