@extends('backend.layouts.app')
@section('content')



<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
  <div class="m-alert__icon">
    <i class="flaticon-exclamation m--font-brand"></i>
  </div>
  <div class="m-alert__text">
    User management  
    <a href="{{ route('backend.users.create') }}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air pull-right">
      <span>
        <i class="la la-cart-plus"></i>
        <span> Create New User</span>
      </span>
    </a>

  </div>
</div>




<div class="m-portlet m-portlet--mobile">
  <div class="m-portlet__head">
    <div class="m-portlet__head-caption">
      <div class="m-portlet__head-title">
        <h3 class="m-portlet__head-text">
          Users Management
        </h3>
      </div>
    </div>

  </div>
  <div class="m-portlet__body">
    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>

        </tr>
      </thead>

      <tbody>

        @foreach ($data as $key => $user)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
            @endforeach
            @endif
          </td>
          <td>
           <a class="btn btn-info" href="{{ route('backend.users.show',$user->id) }}">Show</a>
           <a class="btn btn-primary" href="{{ route('backend.users.edit',$user->id) }}">Edit</a>
           {!! Form::open(['method' => 'DELETE','route' => ['backend.users.destroy', $user->id],'style'=>'display:inline']) !!}
           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
           {!! Form::close() !!}
         </td>
       </tr>
       @endforeach
     </tbody>

   </table>
 </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->           




{!! $data->render() !!}

@section('scripts')
<script type="text/javascript">

  var DatatablesDataSourceHtml = {
    init: function() {
      $("#m_table_1").DataTable({
        responsive: !0,
        columnDefs: [{
          targets: -1,
          title: "Actions",
          orderable: !1,

        }, 
        ]
      })
    }
  };
  jQuery(document).ready(function() {
    DatatablesDataSourceHtml.init()
  });
</script>
@endsection

@endsection