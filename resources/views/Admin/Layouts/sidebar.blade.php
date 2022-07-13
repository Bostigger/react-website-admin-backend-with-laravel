<!--**********************************
        Sidebar start
    ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{\Illuminate\Support\Facades\Auth::user()->profile_picture==null?asset('assets/images/no_image.jpg'): asset(\Illuminate\Support\Facades\Auth::user()->profile_picture)}}" alt="">
            <a href="" data-toggle="modal" data-target="#basicModal"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span>{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <p class="mb-0 fs-14 font-w400">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
        </div>


        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="{{route('dashboard')}}" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>


            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Manage</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">Home Component</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Services</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('view.services')}}">View Services</a></li>
                            <li><a href="{{route('add.services.page')}}">Add Services</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Courses</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('view.courses')}}">View Courses</a></li>
                            <li><a href="{{route('add.courses.page')}}">Add Courses</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Projects</a>
                        <ul aria-expanded="false">
                            <li><a href="./ecom-product-grid.html">Add Project</a></li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
                    <span class="nav-text">Admin Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('change.password.page')}}">Change Password</a></li>
                    <li><a href="{{route('update.profile.page')}}">Update Profile</a></li>
                    <li><a href="{{route('admin.logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Tricksteck</strong> © 2022 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by BOSTIGGER</p>
        </div>
    </div>
</div>

<div class="bootstrap-modal">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#basicModal">Basic modal</button>
    <!-- Modal -->
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('update.profile.picture')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="oldImage" value="{{\Illuminate\Support\Facades\Auth::user()->profile_picture}}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="photo" required class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div>
                            <img src="{{ \Illuminate\Support\Facades\Auth::user()->profile_picture==null?asset('assets/images/no_image.jpg'): asset(\Illuminate\Support\Facades\Auth::user()->profile_picture)}}" style="height: 120px; width: 120px" alt="">
                        </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <input type="submit"  class="btn btn-primary" value="Submit" />
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
