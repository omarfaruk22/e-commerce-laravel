@extends('backend.master_template.backend_template')
@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection
@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Roles & Permission Page</h4>
      <p class="mg-b-0">Edit a Role</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('roleupdate',$role->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
            <div class="col-md-8">
                @include('backend.includes.message')
                <div class="form-group">
                    <label for="name">Role Name</label> 
                    <input type="text" name="name" id="name" placeholder="Enter a Role Name" class="form-control" value="{{ $role->name }}">
                    <span class="text-danger">
                      @error('name')
                        {{ $message }}
                      @enderror
                    </span>
                   </div>
                   <div class="form-group">
                    <label for="name">Permissions</label>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkPermissionAll">All</label>
                    </div>
                    <hr>
                    @php $i = 1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row">
                            @php
                                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                $j = 1;
                            @endphp
                            
                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">
                               
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @php  $j++; @endphp
                                @endforeach
                                <br>
                            </div>

                        </div>
                        @php  $i++; @endphp
                    @endforeach
                </div>
               

                   <div class="form-group">
                    <button class="form-control btn btn-info" >Update Role</button>
                  </div>
                </div>
        </div><!-- col-3 -->
    </form>
  </div><!-- br-pagebody -->
  @endsection
@section('scripts')
<script
src="https://code.jquery.com/jquery-3.7.1.js"
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>
<script>
/**
     * Check all the permissions
     */
     $("#checkPermissionAll").click(function(){
         if($(this).is(':checked')){
             // check all the checkbox
             $('input[type=checkbox]').prop('checked', true);
         }else{
             // un check all the checkbox
             $('input[type=checkbox]').prop('checked', false);
         }
     });

     function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+className+' input');

        if(groupIdName.is(':checked')){
             classCheckBox.prop('checked', true);
         }else{
             classCheckBox.prop('checked', false);
         }
        implementAllChecked();
     }

     function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
        const classCheckbox = $('.'+groupClassName+ ' input');
        const groupIDCheckBox = $("#"+groupID);

        // if there is any occurance where something is not selected then make selected = false
        if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
            groupIDCheckBox.prop('checked', true);
        }else{
            groupIDCheckBox.prop('checked', false);
        }
        implementAllChecked();
     }

     function implementAllChecked() {
         const countPermissions = {{ count($all_permissions) }};
         const countPermissionGroups = {{ count($permission_groups) }};

        //  console.log((countPermissions + countPermissionGroups));
        //  console.log($('input[type="checkbox"]:checked').length);

         if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
            $("#checkPermissionAll").prop('checked', true);
        }else{
            $("#checkPermissionAll").prop('checked', false);
        }
     
     }
     


</script>
@endsection
