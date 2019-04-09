<style type="text/css">
  .alert .close {
    color: #00a8ff;
    opacity: .5;
    position: absolute;
    right: 0px;
    top: -5px!important;
</style>


@if(Session::has('message'))
<div class="alert alert-primary alert-dismissible fade show flash-message" role="alert">
  <strong><i class="ion-alert-circled mr-2 text-warning"></i>Alert</strong> 
  <p>{{session('message')}}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if(Session::has('message_danger'))
<div class="alert alert-danger alert-dismissible fade show flash-message" role="alert">
  <strong><i class="ion-close-circled mr-2 text-danger"></i>Fail</strong> 
  <p>{{session('message_danger')}}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if(Session::has('message_success'))
<div class="alert alert-success alert-dismissible fade show flash-message" role="alert">
  <strong><i class="ion-checkmark-circled mr-2 text-success"></i>Success</strong> 
  <p>{{session('message_success')}}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif





