@extends('layouts.master')
@section('title','تسک ها من')
@section('body')
<div class="bg-white" style="direction: rtl;padding: 30px">
    <h3>تسک های من</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="table ">
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">تاریخ</th>
                    <th scope="col">کاربر تایید کننده</th>
                    <th scope="col">وضعیت</th>
                  </tr>
                </thead>
               
                <tbody>
                    @foreach($tasks as $task)
                  <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{ $now->greaterThan($task->exp_date) ? 'زمان انجام به پایان رسیده':$task->exp_date }}</td>
                     <td>{{App\Models\User::where('id',$task->assign_user_id)->pluck('name')->first()}}</td>
                    <td>{{$task->status == 0 ? 'غیر فعال' : 'فعال'}}</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
        </div>
    </div>

</div>
@endsection
