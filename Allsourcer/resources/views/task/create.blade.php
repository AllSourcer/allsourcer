@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create  a Task</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/createTask') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('filter_id') ? ' has-error' : '' }}">
                            <label for="filter_id" class="col-md-4 control-label">Filter</label>

                            <div class="col-md-6">
                                  <select class="form-control" name="filter_id">
                                        @foreach($filters as $filter)
                                      <option value="{{ $filter->id }}">{{ $filter->name }}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('filter_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filter_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group{{ $errors->has('filter_id') ? ' has-error' : '' }}">
                            <label for="filter_id" class="col-md-4 control-label">Filter Id</label>

                            <div class="col-md-6">
                                <input id="filter_id" type="filter_id" class="form-control" name="filter_id" value="{{ old('filter_id') }}">

                                @if ($errors->has('filter_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filter_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                            <textarea class="form-control" name="description" id="description"  value="{{ old('description') }}"rows="3"></textarea>
                         

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">price</label>

                            <div class="col-md-6">
                                <input id="price" type="price" class="form-control" name="price">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      


                        <div class="form-group{{ $errors->has('work_location') ? ' has-error' : '' }}">
                            <label for="work_location" class="col-md-4 control-label">Work Location</label>

                            <div class="col-md-6">
                                  <select class="form-control" name="work_location">
                                      <option>Remote</option>
                                      <option>Onsite</option>
                                      <option>Onsite Or Remote</option>
                                    </select>
                                @if ($errors->has('work_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('work_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                  <select class="form-control" name="status">
                                      <option>Pending</option>
                                      <option>Completed</option>
                                      <option>Inprogress</option>
                                      <option>Expired</option>
                                    </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration(default =3days)</label>

                            <div class="col-md-6">
                                   <input id="duration" type="number" class="form-control" name="duration">
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="terms"> Accept Terms
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Submit
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection