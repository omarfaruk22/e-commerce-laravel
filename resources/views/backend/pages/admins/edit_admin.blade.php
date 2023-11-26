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
      <h4>Admin page</h4>
      <p class="mg-b-0">Edit a Admin</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('adminupdate',$admin->id)}}" method="post" id="form_sample_1" class="form-horizontal">
          @csrf
          <div class="form-body">
              <div class="row">
                @include('backend.includes.message')
                  <div class="col-md-6">
                    
                 <div class="form-group">
                  <label for="name"> Name</label> 
                  <input type="text" name="name" id="name" placeholder="Enter a Name" class="form-control" value="{{$admin->name}}">
                  <span class="text-danger">
                    @error('name')
                      {{ $message }}
                    @enderror
                  </span>
                 </div>
                 <div class="form-group">
                  <label for="email">User Email</label> 
                  <input type="email" name="email" id="email" placeholder="Enter User Email" class="form-control" value="{{$admin->email}}">
                  <span class="text-danger">
                    @error('email')
                      {{ $message }}
                    @enderror
                  </span>
                 </div>
                 <div class="form-group">
                  <label for="password">Edit Roles</label>
                  <select name="roles[]" id="roles" class="form-control select2" multiple>
                      @foreach ($roles as $role)
                          <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                      @endforeach
                  </select>
              </div>
                
             

                
              </div>
              
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="username">User Name</label> 
                      <input type="text" name="username" id="username" placeholder="Enter a User Name" class="form-control" value="{{ $admin->username}}">
                      <span class="text-danger">
                        @error('username')
                          {{ $message }}
                        @enderror
                      </span>
                     </div>
                  <div class="form-group">
                      <label for="password"> Password</label> 
                      <input type="password" name="password" id="password" placeholder="Enter a Password" class="form-control" value="{{ old('password') }}">
                      <span class="text-danger">
                        @error('password')
                          {{ $message }}
                        @enderror
                      </span>
                     </div>
                     <div class="form-group">
                      <label for="confirmed">Confirm Password</label> 
                      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control" value="{{ old('confirmed') }}">
                      <span class="text-danger">
                        @error('password_confirmation')
                          {{ $message }}
                        @enderror
                      </span>
                     </div>
                  <div class="form-group">
                      <button class="form-control btn btn-info" >Update Admin</button>
                    </div>



              </div>
        
          </div>
          </div>
      </form>
  </div><!-- br-pagebody -->
  @endsection
  @section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({
        theme: 'default', // or another theme you are using
    });
});
</script>
@endsection