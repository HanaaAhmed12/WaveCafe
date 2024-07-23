@extends('layout.mainDash')
@section('head')
@include('includeDash.head2')
@endsection
@section('content')
      	<!-- top navigation -->
          @include('includeDash.topnav')
          <!-- /top navigation -->
      <div class="right_col" role="main">
          <div class="">
              <div class="page-title">
                  <div class="title_left">
                      <h3>Manage Categories</h3>
                  </div>
                  <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search for...">
                              <span class="input-group-btn">
                                  <button class="btn btn-secondary" type="button">Go!</button>
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
                              <h2>List of Categories</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#">Settings 1</a>
                                          <a class="dropdown-item" href="#">Settings 2</a>
                                      </div>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                              </ul>
                              <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="card-box table-responsive">
                                          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                              <thead>
                                                  <tr>
                                                    @if(session('error'))
                                                    <div class="alert alert-danger ">{{ session('error') }}</div>
                                                @endif
                                                      <th>Category Name</th>
                                                      <th>Edit</th>
                                                      <th>Delete</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach($categories as $category)
                                                      <tr>
                                                          <td>{{ $category->name }}</td>
                                                          <td><a href="{{ route('categories.edit', $category->id) }}"><img src="{{ asset('assetsDashboard/images/edit.png') }}" alt="Edit"></a></td>
                                                          <td>
                                                              <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')" style="background: none; border: none; padding: 0; cursor: pointer;">
                                                                    <img src="{{ asset('assetsDashboard/images/delete.png') }}" alt="Delete" ></button>
                                                              </form>
                                                          </td>
                                                      </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @include('includeDash.script2')
@endsection




