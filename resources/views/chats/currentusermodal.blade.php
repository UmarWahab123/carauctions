 <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i data-feather="x"></i>
                            </span>
                            <!-- User Information -->
                            <div class="header-profile-sidebar">
                                <div class="avatar box-shadow-1 avatar-xl avatar-border">
                                    <img src="{{Auth::user()->dp}}" alt="user_avatar" />
                                    <span class="avatar-status-online avatar-status-xl"></span>
                                </div>
                                <h4 class="chat-user-name">{{Auth::user()->name}}</h4>
                                <span class="user-post">{{Auth::user()->role->role_title}}</span>
                            </div>
                            <!--/ User Information -->
                        </header>
                        <!-- User Details start -->
                        <div class="profile-sidebar-area">
                            <h6 class="section-label mb-1">About</h6>
                            <div class="about-user">
                            <h5 class="mb-75">Social Media Links:</h5>
                             <a href="{{Auth::user()->facebook}}">{{Auth::user()->facebook}}</a><br>
                             <a href="{{Auth::user()->twitter}}">{{Auth::user()->twitter}}</a><br>
                             <a href="{{Auth::user()->instagram}}">{{Auth::user()->instagram}}</a><br>
                             <a href="{{Auth::user()->linkedin}}">{{Auth::user()->linkedin}}</a>                  
                            </div>
                            <!-- To set user status -->
                            <h6 class="section-label mb-1 mt-3 d-none">Status</h6>
                            <ul class="list-unstyled user-status d-none">
                                <li class="pb-1">
                                    <div class="custom-control custom-control-success custom-radio">
                                        <input type="radio" id="activeStatusRadio" name="userStatus" class="custom-control-input" value="online" checked />
                                        <label class="custom-control-label ml-25" for="activeStatusRadio">Active</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-danger custom-radio">
                                        <input type="radio" id="dndStatusRadio" name="userStatus" class="custom-control-input" value="busy" />
                                        <label class="custom-control-label ml-25" for="dndStatusRadio">Do Not Disturb</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-warning custom-radio">
                                        <input type="radio" id="awayStatusRadio" name="userStatus" class="custom-control-input" value="away" />
                                        <label class="custom-control-label ml-25" for="awayStatusRadio">Away</label>
                                    </div>
                                </li>
                                <li class="pb-1">
                                    <div class="custom-control custom-control-secondary custom-radio">
                                        <input type="radio" id="offlineStatusRadio" name="userStatus" class="custom-control-input" value="offline" />
                                        <label class="custom-control-label ml-25" for="offlineStatusRadio">Offline</label>
                                    </div>
                                </li>
                            </ul>
                            <!--/ To set user status -->

                            <!-- User settings -->
                            <h6 class="section-label mb-1 mt-2">Settings</h6>
                            <ul class="list-unstyled">
                             
                            <a href="{{url('admin/userprofile/'.Auth::user()->id)}}"><li class="mb-1 d-flex align-items-center cursor-pointer">
                             <i data-feather="user" class="mr-75 font-medium-3"></i>
                                    <span class="align-middle">Details</span>
                                </li></a>
                             <a href="{{url('admin/user/'.Auth::user()->id)}}"><li class="mb-1 d-flex align-items-center cursor-pointer">
                                <i data-feather="user" class="mr-75 font-medium-3"></i>
                                    <span class="align-middle">Edit</span>
                                </li></a>
                            <a href="{{url('admin/deletetraining/'.Auth::user()->id)}}"><li class="d-flex align-items-center cursor-pointer">
                                 <i data-feather="trash" class="mr-75 font-medium-3"></i>
                                    <span class="align-middle">Delete Account</span>
                                </li></a>
                            </ul>
                            <!--/ User settings -->

                            <!-- Logout Button -->
                            <div class="mt-3">
                            <a href="{{url('admin/adminlogout')}}">
                                <button class="btn btn-primary">
                                    <span>Logout</span>
                                </button>
                            </a>

                            </div>
                            <!--/ Logout Button -->
                        </div>
                        <!-- User Details end -->
                    </div>
                    <!--/ Admin user profile area -->
