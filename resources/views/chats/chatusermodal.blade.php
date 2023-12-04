                         <header class="user-profile-header">
                                <span class="close-icon">
                                    <i data-feather="x"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </span>
                                <!-- User Profile image with name -->
                                <div class="header-profile-sidebar">
                                    <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                        <img src="{{$data['usermodal']->dp}}" alt="user_avatar" height="70" width="70" />
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">{{$data['usermodal']->name}}</h4>
                                    <span class="user-post">{{$data['usermodal']->role->role_title}}</span>
                                </div>
                                <!--/ User Profile image with name -->
                         </header>
                            <div class="user-profile-sidebar-area">
                                <!-- About User -->
                                <h6 class="section-label mb-1">About</h6>
                                <h5 class="mb-75">Social Media Links:</h5>
                                <a href="{{$data['usermodal']->facebook}}">{{$data['usermodal']->facebook}}</a><br>
                                <a href="{{$data['usermodal']->twitter}}">{{$data['usermodal']->twitter}}</a><br>
                                <a href="{{$data['usermodal']->instagram}}">{{$data['usermodal']->instagram}}</a><br>
                                <a href="{{$data['usermodal']->linkedin}}">{{$data['usermodal']->linkedin}}</a> 

                                <!-- About User -->
                                <!-- Users Setting -->
                                <h6 class="section-label mt-1 mb-1">Settings</h6>
                                 <ul class="list-unstyled">
                                    <a href="{{url('admin/userprofile/'.$data['usermodal']->id)}}"><li class="mb-1 d-flex align-items-center cursor-pointer">
                                            <i data-feather="user" class="mr-75 font-medium-3"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-75 font-medium-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <span class="align-middle">Details</span>
                                        </li></a>
                                     <a href="{{url('admin/user/'.$data['usermodal']->id)}}"><li class="mb-1 d-flex align-items-center cursor-pointer">
                                    <i data-feather="user" class="mr-75 font-medium-3"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-75 font-medium-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <span class="align-middle">Edit</span>
                                        </li></a>
                                    <a href="{{url('admin/deletetraining/'.$data['usermodal']->id)}}"><li class="d-flex align-items-center cursor-pointer">
                                     <i data-feather="trash" class="mr-75 font-medium-3"></i>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-75 font-medium-3"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            <span class="align-middle">Delete Account</span>
                                        </li></a>
                                    </ul>    

                                </div>

                                <!--/ Users Setting -->

                        <!--/ User Chat profile right area -->
