@extends('admin.shared.layouts')

@section('content')
<style>
  
    .rating {
  display: inline-block;
}

.rating input {
  display: none;
}

.rating label {
  cursor: pointer;
  width: 25px;
  height: 25px;
  margin: 0 2px;
  background-color: #ddd;
  border-radius: 50%;
}

.rating label:hover,
.rating label:hover ~ label {
  background-color: #f8d053;
}

.rating input:checked ~ label {
  background-color: #f8d053;
}

</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form action="review/store" method="POST">
              @csrf
                <div class="card">
                <div class="card-header">Membership Information</div>
                    <div class="card-body">
                        <p>User ID: <input type="text" name="user" value ="{{ $MembershipData->first()->user_id }}"readonly> </p> 
                        <p>Membership Plan:  <input type="text" name="plan" value ="{{ $MembershipData->first()->membership_type }}"readonly></p>
                        <p>Duration:<input type="text" name="duration" value ="{{ $MembershipData->first()->duration }}"readonly> </p>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Review</div>
                    

                    <div class="card-body">
                    <div class="rating d-flex flex-row-reverse justify-content-center">
                        <input type="radio" id="star10" name="rating" value="10">
                        <label for="star10"></label>
                        <input type="radio" id="star9" name="rating" value="9">
                        <label for="star9"></label>
                        <input type="radio" id="star8" name="rating" value="8">
                        <label for="star8"></label>
                        <input type="radio" id="star7" name="rating" value="7">
                        <label for="star7"></label>
                        <input type="radio" id="star6" name="rating" value="6">
                        <label for="star6"></label>
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1"></label>
                    </div>

                    <br>

                    <div class="d-flex justify-content-center">
                        <label for="comment">Comment: &nbsp</label>
                        <input name="comment" type="text">
                    </div>

                    <br>

                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                    </div>

                                            
                    </form>
            </div>
        </div>
    </div>
@endsection
