@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard: Add Admin</div>
                <div class="card-body">
                    <form class="form-group" method="POST" action="addAdmin">
                        @csrf
                        <div class="row">
                            <div class="col col-md-4 col-lg-4 col-sm-4">
                                <label>Name</label>
                            </div>
                            <div class="col col-md-8 col-lg-8 col-sm-8">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-4 col-lg-4 col-sm-4">
                                <label>Email</label>
                            </div>
                            <div class="col col-md-8 col-lg-8 col-sm-8">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <input type="submit" name="Add" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection