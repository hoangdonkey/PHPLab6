@php

@endphp
{{-- Thua ke tu view/layout/app.blade.php --}}
@extends('layouts.app')

{{-- Bat dau noi dung khac nhau giua cac trang con, su dung app.css --}}
@section('content')

<div class="panel-body">
    @include('errors.503')

    <form action="{{url('task')}}" method="post" class="form-horizontal">
        {{csrf_field()}}

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        {{-- Nut submit --}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus">Add Task</i>
                </button>
            </div>
        </div>
    </form>

    @if (count($tasks)>0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Task
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <td>Task</td>
                        <td>&nbsp;</td>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{$task->name}}</div>
                                </td>
                                <td>
                                    <form action="/task/{{$task->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button>Delete Task</button>
                                        <input type="hidden" name="method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

@endsection
