 @extends('layout.mainDash')
@section('head')
@include('includeDash.head')
@endsection
@section('content')
     <!-- top navigation -->
     @include('includeDash.topnav')
     <!-- /top navigation -->

                                                            <!-- page content -->
                                                            <div class="right_col" role="main">
                                                                <div class="">
                                                                    <div class="page-title">
                                                                        <div class="title_left">
                                                                            <h3>Manage Beverages</h3>
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
                                                                                    <h2>Edit Beverage</h2>
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
                                                                                    <form action="{{ route('beverages.update', $beverage->id) }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                                                        @csrf
                                                                                        @method('put')

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span></label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                <input type="text" id="title" name="title" required class="form-control" value="{{ $beverage->title }}">
                                                                                                @error('title')
                                                                                                    <p style="color: red">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span></label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                <textarea id="content" name="content" required class="form-control">{{ old('content', $beverage->content) }}</textarea>
                                                                                                @error('content')
                                                                                                    <p style="color: red">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                <input id="price" class="form-control" type="number" name="price" required value="{{ $beverage->price }}">
                                                                                                @error('price')
                                                                                                    <p style="color: red">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                <div class="checkbox">
                                                                                                    <label>
                                                                                                        <input type="hidden" name="published" value="0">
                                                                                               <input type="checkbox" class="flat" name="published" value="1" {{ old('published', $beverage->published) ? 'checked' : '' }}>
                                                                                                    </label>
                                                                                                </div>
                                                                                                @error('published')
                                                                                                    <p style="color: red">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Special</label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                <div class="checkbox">
                                                                                                    <label>
                                                                                                        <input type="checkbox" class="flat" name="special"  value="1" {{ old('special', $beverage->special) ? 'checked' : '' }}>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image</label>
                                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                                @if($beverage->image)
                                                                                                    <img src="{{ asset('assets2/images/' . $beverage->image) }}" alt="Beverage Image" width="100">
                                                                                                @endif
                                                                                                <input type="file" class="form-control" name="image" id="image">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="item form-group">
                                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span></label>
                                                                                            <div class="col-md-6 col-sm-6">
                                                                                                @php
                                                                                                    $categories = \App\Models\Category::all();
                                                                                                @endphp
                                                                                                <select class="form-control" name="category_id" id="category_id" required>
                                                                                                    <option value="">Select Category</option>
                                                                                                    @foreach($categories as $category)
                                                                                                        <option value="{{ $category->id }}" {{ $beverage->category_id == $category->id ? 'selected' : '' }}>
                                                                                                            {{ $category->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                @error('category_id')
                                                                                                    <p style="color: red">{{ $message }}</p>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ln_solid"></div>

                                                                                        <div class="item form-group">
                                                                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                                                                <a href="{{ route('beverages.index') }}" class="btn btn-primary">Cancel</a>
                                                                                                <button type="submit" class="btn btn-success">Update</button>
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
