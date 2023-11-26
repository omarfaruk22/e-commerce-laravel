@php
$user = Auth::guard('web')->user();
@endphp
<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    @if ($user->can('dashboard.view'))
    <li class="br-menu-item">
      <a href="index.html" class="br-menu-link active">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    @endif
    @if ($user->can('role.create') || $user->can('role.view') ||  $user->can('role.edit') ||  $user->can('role.delete'))
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Roles & Permissions</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        @if ($user->can('role.create'))
        <li class="sub-item"><a href="{{route('rolecreate')}}" class="sub-link">Create Role</a></li>
        @endif
        @if ($user->can('role.view'))
        <li class="sub-item"><a href="{{route('rolemanage')}}" class="sub-link">All Roles</a></li>
        @endif
      </ul>
    </li>
    @endif

    @if ($user->can('admin.create') || $user->can('admin.view') ||  $user->can('admin.edit') ||  $user->can('admin.delete'))
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Administrator</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        @if ($user->can('admin.create'))
        <li class="sub-item"><a href="{{route('admincreate')}}" class="sub-link">Create Users</a></li>
        @endif
        @if ($user->can('admin.view'))
        <li class="sub-item"><a href="{{route('adminmanage')}}" class="sub-link">All Users</a></li>
        @endif
      </ul>
    </li>
    @endif


  </div><!-- info-list -->

  <br>
</div><!-- br-sideleft -->