@extends('layout.layout')
@section('content')
  <div class="content-wrapper">
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>campaign</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Campaigns</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	

	
	
	
    <section class="content">

    <div class="container-fluid">
    <div class="row">

    <div class="col-12">

    <div class="card">
    <div class="card-header">
      <h3 class="card-title">
          
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add Campaign
               </button></h3>

</div>

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Default Modal</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="post" action="{{route('campaigns.create')}}">
@csrf
<p>
<input type="text"
class="form-control" 
id="exampleInputEmail1"
name="name"
placeholder="Enter campaign">
<br/>
<select name="project" class="custom-select rounded-0" id="exampleSelectRounded0">
@foreach($projects as $key=>$value)
<option value="{{$key}}">{{$value}}</option>
@endforeach
</select>  
</p>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add campaign</button>
</form>
</div>
</div>
</div>
</div>
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S.No</th>
          <th> Name</th>
          <th>Project</th>
          <th>opens</th>
          <th>clicks</th>
          <th>view</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($campaigns as $key=>$data)
<tr>
<td>{{ $loop->iteration }}</td>

<td>
{{$data->name}}

</td>

<td>
{{$data->project->name}}
</td>
<td>
{{$data->opens}}

</td>
<td>
{{$data->clicks}}

</td>

<td>

<a href="{{url('/campaigns')}}/{{$data->id}}"class="btn btn-primary" > <i class="fa fa-eye"></i>
</a> 
<a href="{{url('/campaigns/delete')}}/{{$data->id}}"class="btn btn-danger" > <i class="fa fa-trash"></i>

</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary{{$data->id}}">
    <i class="fa fa-pencil"></i>
</button>
<div class="modal fade" id="modal-primary{{$data->id}}" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
<div class="modal-content ">
<div class="modal-header">
<h4 class="modal-title">Update</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="post"  action="{{route('campaign.update')}}">
        @csrf
<p>
<input type="text"
 class="form-control" 
 id="exampleInputEmail1"
  placeholder="Enter Project"
  name="name"
  required
  value="{{$data->name}}"
  >
  <br/>
<select name="project" class="custom-select rounded-0" id="exampleSelectRounded0">
@foreach($projects as $key=>$value)
<option {{$data->project_id == $key ?'selected':''}}  value="{{$key}}">{{$value}}</option>
@endforeach
</select> 

  <input type="hidden"
 class="form-control" 
 id="exampleInputEmail1"
  placeholder="Enter Project"
  name="id"
  required
  value="{{$data->id}}"
  
  >

</p>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
              </form>
</div>
</div>

</div>

</div>
</td>
</tr>
@endforeach
        
        </tbody>
        <tfoot>
         <tr>
         <th>S.No</th>
          <th> Name</th>
          <th>Project</th>
          <th>opens</th>
          <th>clicks</th>
          <th>view</th>
        </tr>
        </tfoot>
      </table>
</div>

  </div>

    </div>
</div>
        <!-- /.row -->
      </div>
    </section>
	
	
  
  
   </div>
  @endsection