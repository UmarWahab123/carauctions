<header class="chat-header">
    <div class="d-flex align-items-center">
        <div class="sidebar-toggle d-block d-lg-none mr-1">
            <i data-feather="menu" class="font-medium-5"></i>
        </div>
        <div class="avatar avatar-border user-profile-toggle m-0 mr-1" data-id="{{$data['chatuser']->id}}">
            <img src="{{$data['chatuser']->dp}}"  alt="avatar" height="36" width="36" />
            <span class="avatar-status-busy"></span>
        </div>
        <h6 class="mb-0">{{$data['chatuser']->name}}</h6>
    </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="more-vertical" id="chat-header-actions" class="font-medium-2"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
                <a class="dropdown-item" href="{{url('profile')}}/{{$data['chatuser']->id}}">View User</a>
                <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
            </div>
        </div>
    </div>
</header>
