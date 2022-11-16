@extends('dashboard.dashboard')
@section('dashusers')
active
@endsection
@section('content')
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Users</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="javascript:void(0)">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                  <a href="javascript:void(0)">Users</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
              <div class="left">
             <form method="GET" action="{{route('09ktQ1IXYRvjDjJ')}}"> 
                  @if ($select_role_value=='0')
                  <select class="form-select" name="select_role" onchange="this.form.submit();">
                    <option selected value="0">User</option>
                    @if (auth::user()->role=='2IsMJXAEa84z')
                    <option value="2IsMJXAEa84z">Admin</option>
                    @endif
                    <option value="GQNkMkboa9fd">Editor</option>
                  </select>
                  @elseif ($select_role_value=='2IsMJXAEa84z')
                  <select class="form-select" name="select_role" onchange="this.form.submit();" >
                    <option  value="0">User</option>
                    <option selected value="2IsMJXAEa84z">Admin</option>
                    <option value="GQNkMkboa9fd">Editor</option>
                  </select>
                  @elseif ($select_role_value=='GQNkMkboa9fd')
                  <select class="form-select" name="select_role" onchange="this.form.submit();">
                    <option  value="0">User</option>
                    @if (auth::user()->role=='2IsMJXAEa84z')
                    <option value="2IsMJXAEa84z">Admin</option>
                    @endif
                    <option selected value="GQNkMkboa9fd">Editor</option>
                  </select>
                  @else
                  <select class="form-select" name="select_role" onchange="this.form.submit();">
                    <option value="0">User</option>
                    @if (auth::user()->role=='2IsMJXAEa84z')
                    <option value="2IsMJXAEa84z">Admin</option>
                    @endif
                    <option value="GQNkMkboa9fd">Editor</option>
                  </select>
                    
                  @endif
                
                </form>
              
                
              </div>
              <div class="right">
                <div class="table-search d-flex">
                  <form >
                    <input type="text" placeholder="Search..." id="search_input" onkeyup="search_user()">
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="lead-info">
                      <h6>User</h6>
                    </th>
                    <th class="lead-email">
                      <h6>Email</h6>
                    </th>
                    <th class="lead-phone">
                      <h6>Phone No</h6>
                    </th>
                    <th class="lead-company">
                      <h6>Role</h6>
                    </th>

                    <th>
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody id="datatable">
                  
                  <!-- end table row -->
                  
                    
                  <!-- end table row -->
                  @foreach ($users as $user )
                  <tr id="{{$user->id}}">
                    <td>
                      <div class="lead">
                        <div class="lead-image">
                          <span class="icon">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg fill="#13224F" width="40" height="40" version="1.1" id="lni_lni-user"
                              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                              y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                              <g>
                                <path d="M32,36.4c8.2,0,14.9-6.7,14.9-14.9S40.2,6.5,32,6.5s-14.9,6.7-14.9,14.9S23.8,36.4,32,36.4z M32,10
		c6.3,0,11.4,5.1,11.4,11.4c0,6.3-5.1,11.4-11.4,11.4c-6.3,0-11.4-5.1-11.4-11.4C20.6,15.2,25.7,10,32,10z" />
                                <path
                                  d="M62.1,54.4c-8.3-7.1-19-11-30.1-11s-21.8,3.9-30.1,11C1.1,55,1,56.1,1.7,56.9c0.6,0.7,1.7,0.8,2.5,0.2
		c7.7-6.5,17.6-10.1,27.9-10.1s20.2,3.6,27.9,10.1c0.3,0.3,0.7,0.4,1.1,0.4c0.5,0,1-0.2,1.3-0.6C63,56.1,62.9,55,62.1,54.4z" />
                              </g>
                            </svg>



                          </span>
                        </div>
                        <div class="lead-text">
                          <p>{{$user->name}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p>{{$user->email}}</p>
                    </td>
                    <td>
                      <p>{{$user->phone}}</p>
                    </td>
                    <td>
                      @if ($user->role=='0')
                      <select class="form-select  w-50" id="role{{$user->id}}" >
                        <option selected value="0" onclick="update_user({{$user->id}})">User</option> 
                        <option value="2IsMJXAEa84z" onclick="update_user({{$user->id}})">Admin</option>
                        <option value="GQNkMkboa9fd" onclick="update_user({{$user->id}})">Editor </option>
                      </select>
                      @elseif ($user->role=='2IsMJXAEa84z')
                      <select class="form-select  w-50" id="role{{$user->id}}" >
                        <option  value="0" onclick="update_user({{$user->id}})">User</option>
                        <option  selected value="2IsMJXAEa84z" onclick="update_user({{$user->id}})" >Admin</option>
                        <option value="GQNkMkboa9fd" onclick="update_user({{$user->id}})">Editor </option>
                      </select>
                      @elseif ($user->role=='GQNkMkboa9fd')
                      <select class="form-select  w-50" id="role{{$user->id}}" >
                        <option  value="0" onclick="update_user({{$user->id}})">User</option>
                        <option value="2IsMJXAEa84z" onclick="update_user({{$user->id}})">Admin</option>
                        <option selected value="GQNkMkboa9fd" onclick="update_user({{$user->id}})">Editor </option>
                      </select>
                      @endif
                     
                    </td>

                    <td>
                      <div class="action">
                        <button  class="text-danger" onclick="delete_user({{$user->id}})">
                          <i class="lni lni-trash-can"></i>
                        </button >
                      </div>
                    </td>
                  </tr>
                  @endforeach
                
                  <!-- end table row -->
                </tbody>
              </table>
              <!-- end table -->
            </div>
            <div class="pt-10 d-flex flex-wrap justify-content-between">
              <div class="left">
                <p class="text-sm text-gray" id="user_count">all Users : {{$users_count}} </p>
              </div>
              <div class="right table-pagination">
          {{$users->appends($_GET)->links()}}
              </div>
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
@endsection

@section('script')
<script>
function delete_user(str) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'id': str,

  }
  $.ajax({

      type: "POST",
      url: "{{route('delete_user_dashboard')}}",
      data: data,
      dataType: 'json',
      success: function (response) {

          document.getElementById(response.id).innerHTML = "";








      }



  })
}

function update_user(str) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'id': str,
      'role': $('#role'+str).val(),

  }
  $.ajax({

      type: "POST",
      url: "{{route('update_user_dashboard')}}",
      data: data,
      dataType: 'json',
      success: function (response) {

          document.getElementById(response.id).innerHTML = "";








      }



  })
}

function search_user() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var data = {

      'search_input': $('#search_input').val(),

  }
  $.ajax({

      type: "POST",
      url: "{{route('search_user_dashboard')}}",
      data: data,
      dataType: 'json',
      success: function (response) {

          document.getElementById("datatable").innerHTML = "";
          $.each(response.user,function (key,user) { 
                           
                           $("#datatable").append('<tr id="'+user.id+'">\
                    <td>\
                      <div class="lead">\
                        <div class="lead-image">\
                          <span class="icon">\
                            <?xml version="1.0" encoding="utf-8"?>\
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)-->\
                            <?xml version="1.0" encoding="utf-8"?>\
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)-->\
                            <svg fill="#13224F" width="40" height="40" version="1.1" id="lni_lni-user"\
                              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"\
                              y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">\
                              <g>\
                                <path d="M32,36.4c8.2,0,14.9-6.7,14.9-14.9S40.2,6.5,32,6.5s-14.9,6.7-14.9,14.9S23.8,36.4,32,36.4z M32,10\
		c6.3,0,11.4,5.1,11.4,11.4c0,6.3-5.1,11.4-11.4,11.4c-6.3,0-11.4-5.1-11.4-11.4C20.6,15.2,25.7,10,32,10z" />\
                                <path\
                                  d="M62.1,54.4c-8.3-7.1-19-11-30.1-11s-21.8,3.9-30.1,11C1.1,55,1,56.1,1.7,56.9c0.6,0.7,1.7,0.8,2.5,0.2\
		c7.7-6.5,17.6-10.1,27.9-10.1s20.2,3.6,27.9,10.1c0.3,0.3,0.7,0.4,1.1,0.4c0.5,0,1-0.2,1.3-0.6C63,56.1,62.9,55,62.1,54.4z" />\
                              </g>\
                            </svg>\
                          </span>\
                        </div>\
                        <div class="lead-text">\
                          <p>'+user.name+'</p>\
                        </div>\
                      </div>\
                    </td>\
                    <td>\
                      <p>'+user.email+'</p>\
                    </td>\
                    <td>\
                      <p>'+user.phone+'</p>\
                    </td>\
                    <td>\
                      <select class="form-select  w-50" id="role'+user.id+'">\
                        <option selected value="0" onclick="update_user('+user.id+')">User</option> \
                        <option value="2IsMJXAEa84z" onclick="update_user('+user.id+')">Admin</option>\
                        <option value="GQNkMkboa9fd" onclick="update_user('+user.id+')">Editor </option>\
                      </select>\
                    </td>\
                    <td>\
                      <div class="action">\
                        <button  class="text-danger" onclick="delete_user('+user.id+')">\
                          <i class="lni lni-trash-can"></i>\
                        </button >\
                      </div>\
                    </td>\
                  </tr>');
                          
                          })

                          document.getElementById("user_count").innerHTML = 'All users : '+response.user_count+'';






      }



  })
}
</script>
@endsection