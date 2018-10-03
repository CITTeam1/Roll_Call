@extends('layouts.master')

@section('content')
<div class="container-fluid" style="margin-top: 7%">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <!-- Title of Page /DB-->
        <div class="col-xl-10">
            <h1 class="text-center">Test Search Page</h1>
            <!--Search Bar /DB-->
            <input style="width: 11em; text-align: center;" type="text" maxlength="9"  class="form-control" id="admitId" name="admitId" placeholder="Student ID: 'L-0000000' required="" autofocus="autofocus">
            <!--Search Button to right of the bar /DB-->
            <div class="input-group-append">
                            <button id="admitButton" class="btn btn-primary" type="button">Search</button>
                        </div>