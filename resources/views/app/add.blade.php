@extends('layouts.master')
@section('title','افزودن تسک جدید')
@section('body')
<div class="bg-white" style="direction: rtl;padding: 30px">
    <h3 >افزودن تسک جدید</h3>
    
    <form action="{{route('AddTask')}}" method="POST" class="mt-4">
        @csrf
        <div class="row">
            <div class="col-lg-2"> <label for="title">عنوان</label></div>
            <div class="col-lg-4">
                <input class="form-control" name="title" placeholder="عنوان" value="{{old('title')}}"   />
                @error('title')<span class="text-danger"> {{$message}} </span> @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-2"> <label for="title">تاریخ</label></div>
            <div class="col-lg-4">
                <input type="datetime-local" class="form-control" name="date" value="{{old('date')}}" />
                @error('date')<span class="text-danger"> {{$message}} </span> @enderror
            </div>
        </div><br>
         <div class="row">
            <div class="col-lg-2"> <label for="title">ارسال برای کاربر </label></div>
            <div class="col-lg-4">
                <select class="form-control" name="assign_user_id" value="{{old('user_id')}}" >
                    <option value=""></option>
                    @foreach($users as $user)
                      
                     <option value="{{$user->id}}" >{{$user->name}}</option>
                    @endforeach
                
                </select>
                @error('assign_user_id')<span class="text-danger"> {{$message}} </span> @enderror
            </div>
        </div>
        <button class="btn btn-info mt-4" type="submit">ذخیره</button>
    </form>

</div>
@endsection
