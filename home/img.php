<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form method="post" action="" enctype="multipart/form-data">
			<table border="1" cellpadding="3" cellspacing="3">
				<tr align="center">
					<td width="300" height="30">Name</td>
					<td width="300" height="30"><input type="text" name="name" placeholder="Enter your name"></td>
				</tr>
				<tr align="center">
					<td width="300" height="30">Image</td>
					<td width="300" height="30"><input type="file" name="img"></td>
				</tr>
				<tr align="right">
					<td width="600" colspan="2"><input type="submit" name="btn" value="submit"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>

<?php
	if(isset($_POST['btn'])){

		$name = $_POST['name'];
		$img = $_FILES["img"];
		$sr = $img["tmp_name"];
		$dst = "dir/".$img["name"];

		$conn = mysqli_connect("localhost","root","","kpi");
		if(move_uploaded_file($sr, $dst)){
			$sql = "INSERT INTO img(name,img) VALUES('$name','$dst')";
			if($rst = mysqli_query($conn,$sql)){
				header('location:img_report.php');
			}
		}
	}
?>


@extends('admin.master')
@section('title','Employee List')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">

            <!-- Message -->
            @if(Session::get('message'))
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong> {{Session::get('message')}} </strong>
              </div>
            @endif
            <!-- /Message -->

            <!--Main-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="boxbg">
                        <div class="box-header with-border" style="font-size: 18px;">
                            <b>All Employee List</b>  <a class="btn btn-success pull-right" href="{{url('employees/create')}}">Add Employee</a>        
                        </div>
                        <div class="box-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Contact no</th>
                                        <th width="10%">View PDF</th>
                                        <th width="10%">Action</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                    @foreach($employees as $key => $employee)
                                        <tr class="{{ $employee->id }}">
                                            <td>{{ $key+1  }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->designation }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->contact_no }}</td>
                                            <td>
                                                <a target="_blank" href="{{url('hbw/hbwPdf?hbw_id='.$h->hbw_id)}}" title="View PDF" class="btn btn-info btn-xs"><i class="fa fa-file"></i> View PDF
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('employees/getEmployee/'.$employee->id) }}" title="View Details" class="btn btn-primary btn-xs viewDetails"><i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{ !empty($employee->id) ? url('employees/edit/'.$employee->id) : '' }}"  class="btn btn-success btn-xs"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                                <a href="{{ !empty($employee->id) ? url('employees/delete') : ''}}"  class="delete btn btn-danger btn-xs deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $employee->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Main-->

                </div>
            </div>
        </div>
    </section>
</div>
@endsection