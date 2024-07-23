@extends('layout.mainDash')
@section('head')
@include('includeDash.head2')
@endsection
@section('content')
<!-- top navigation -->
@include('includeDash.topnav', ['unreadCount' => $unreadCount, 'messages' => $messages])
<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Users</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add User</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" action="{{ route('addUser.store') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                        @csrf
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span></label>
                                            @error('first-name')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" name="first-name" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span></label>
                                            @error('user-name')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="user-name" name="user-name" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                                            @error('email')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="email" name="email" class="form-control" type="email" required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                                            @error('password')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="password" name="password" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="active">Active <span class="required">*</span></label>
                                        <div>
                                       <input type="checkbox" id="active" name="active" class="form-control"><br><br>
                                    </div>
                                    </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="button">Cancel</button>
                                                <button type="submit" class="btn btn-success">Add</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
@include('includeDash.script')
@endsection
