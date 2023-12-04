   <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i data-feather="x"></i>
                        </span>
                        <!-- Sidebar header start -->
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center w-100">
                                <div class="sidebar-profile-toggle">
                                    <div class="avatar avatar-border">
                                        <img src="{{Auth::user()->dp}}" alt="user_avatar" height="42" width="42" />
                                        <span class="avatar-status-online"></span>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge ml-1 w-100">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search" />
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar header end -->

                        <!-- Sidebar Users start -->
                        <div id="users-list" class="chat-user-list-wrapper list-group">
                            <h4 class="chat-list-title">Chats</h4>
                            <ul class="chat-users-list chat-list media-list">
                                @foreach($data['users'] as $value)
                                <li data-id={{$value->id}}>
                                    <span class="avatar"><img src="{{$value->dp}}" height="42" width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-offline"></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{$value->name}}</h5>
                                        <p class="card-text text-truncate">
                                            {{$value->msg}}
                                        </p>
                                    </div>
                                    <div class="chat-meta text-nowrap">
                                        <small class="float-right mb-25 chat-time">{{$value->time}}</small>
                                        @if ($value->count>0)
                                         <span class="badge badge-danger badge-pill float-right ">{{$value->count}}</span>

                                        @endif
                                    </div>
                                </li>
                                @endforeach
                                <li class="no-results">
                                    <h6 class="mb-0">No Chats Found</h6>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Users end -->
                    </div>
                    <!--/ Chat Sidebar area -->
