@extends('layouts.app')
@section('content')

<h3 align="center">DASHBOARD TEST CENTER MANAGER</h3>
<div class="container">
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tester</a>
    <a class="nav-item nav-link" id="nav-applicant-tab" data-toggle="tab" href="#nav-applicant" role="tab" aria-controls="nav-applicant" aria-selected="false">Test Center Officer</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="false">Test Kit Stock</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Programme</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="university/addProgramme" method="post">
              @csrf
              <input class="form-control" type="text" placeholder="Programme Name" name="programmeName">

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>

              <p style="margin-top:15px;">Closing Date</p>
              <input class="form-control" type="date" name="closeDate">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="tab-pane fade" id="nav-applicant" role="tabpanel" aria-labelledby="nav-applicant-tab" style="padding-top: 50px;">
  </div>
  <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
    <form class="" action="university/updateDetails" method="post">
      @csrf
      <div class="form-group">
        <p style="margin-top:10px;" ></p>
      </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection
