@extends('layouts.app')
@section('content')

<h3 align="center">DASHBOARD TEST CENTER MANAGER</h3>
<div class="container">

@if(Session::has('status'))
  <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
    {{ Session::get('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Record Tester</a>
    <a class="nav-item nav-link" id="nav-testcenter-tab" data-toggle="tab" href="#nav-testcenter" role="tab" aria-controls="nav-testcenter" aria-selected="false">Register Test Center</a>
    <a class="nav-item nav-link" id="nav-testkit-tab" data-toggle="tab" href="#nav-testkit" role="tab" aria-controls="nav-testkit" aria-selected="false">Test Kit Stock</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <!-- Button trigger modal -->
    <button style="margin-top: 30px; margin-bottom: 30px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Add Tester
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Tester</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="/addTester" method="post">
              @csrf
              <input type="hidden" name="role" value="tester">
              <input class="form-control" type="text" placeholder="Tester Name" name="testerName">
              <br>
              <input class="form-control" type="text" placeholder="Email" name="email">
              <br>
              <input class="form-control" type="password" placeholder="Password" name="password">
              <br>
              <!--
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div> -->

              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- data list -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testerDataList as $key=>$testerDataList)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$testerDataList->name}}</td>
              <td>{{$testerDataList->role}}</td>
              <td>{{$testerDataList->email}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

  <div class="tab-pane fade show" id="nav-testcenter" role="tabpanel" aria-labelledby="nav-testcenter-tab">
    <!-- Button trigger modal -->
    <button style="margin-top: 30px; margin-bottom: 30px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
      Add Test Center
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Test Center</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="/addTestCenter" method="post">
              @csrf
              <input type="hidden" name="role" value="testCenter">
              <input class="form-control" type="text" placeholder="Test Center Name" name="testCenterName">
              <br>

              <!--
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div> -->

              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- data list -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testCenterDataList as $key=>$testCenterDataList)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$testerDataList->name}}</td>
              <td>{{$testerDataList->role}}</td>
              <td>{{$testerDataList->email}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

  <div class="tab-pane fade show" id="nav-testkit" role="tabpanel" aria-labelledby="nav-testkit-tab">
    <!-- Button trigger modal -->
    <button style="margin-top: 30px; margin-bottom: 30px;"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
      Add Test Kit
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Test Kit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="/testkit/add" method="post">
              @csrf
              <input class="form-control" type="text" placeholder="Name" name="name">
              <br>
              <input class="form-control" type="number" placeholder="Amount" name="amount">
              <br>
              <!--
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div> -->

              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- data list -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($testKitDataList as $key=>$testKitDataList)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$testKitDataList->name}}</td>
              <td>{{$testKitDataList->amount}}</td>
              <td>{{$testKitDataList->created_at}}</td>
              <td>{{$testKitDataList->updated_at}}</td>
              <td>
                <!-- Button trigger modal -->
                <button type="button" style="float: left;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$key}}">
                  Edit
                </button>

                <form class="" action="/testkit/delete" method="post" >
                  @method('DELETE')
                  @csrf
                  <input type="hidden" name="id" value="{{$testKitDataList->id}}">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                    Delete
                  </button>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Test Kit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="/testkit/update" method="post">
                          @method('PUT')
                          @csrf
                          <input type="hidden" name="id" value="{{$testKitDataList->id}}">
                          <input class="form-control" type="text" placeholder="Name" name="name" value="{{$testKitDataList->name}}">
                          <br>
                          <input class="form-control" type="number" placeholder="amount" name="amount" value="{{$testKitDataList->amount}}">
                          <br>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                      </div>
                    </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
</div>
</div>
@endsection
