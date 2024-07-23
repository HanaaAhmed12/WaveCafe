<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{asset('assetsDashboard/images/img.jpg')}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>  @auth
            <p>{{ Auth::user()->name }}</p>
        @else
            <p>Welcome, Guest</p>
        @endauth</h2>
    </div>
</div>


