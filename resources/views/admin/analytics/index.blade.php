@extends('admin.shared.layouts')
<style>
        body {
            background-image: url('{{ asset("images/background5.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #49243E; /* Change the background color as needed */
            color: white; /* Change text color to white */
        }

        .transparent-container {
            background-color: #C6EBC5; /* Set background color with alpha value for transparency */
            padding: 20px; /* Add padding for better visibility */
            border-radius: 20px; /* Add border radius for rounded corners */
        }

        .transparent-card {
            background-color: transparent !important; /* Set card background color to transparent */
            border: none; /* Remove card border */
            color: #E178C5; /* Change card text color to white */
        }
    </style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Analytics</h1>
                </div>
                <div class="card-body">
                {{ $dataTable->table() }}
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card text-center">
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
                    <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" role="tab" data-toggle="tab">Reviews - Standard Membership</a>
                    </li>
                    <li role="presentation"><a href="#one" role="tab" data-toggle="tab">Reviews - Premium Membership</a>
                    </li>
                    <li role="presentation"><a href="#contact" role="tab" data-toggle="tab">Reviews - VIP Membership</a>
                    </li>
                    </ul>

                    <div class="container-fluid">
                    <div class="tab-content">
                        <div id="home" role="tabpanel" class="tab-pane fade in active">
                        <div class="alert alert-info">Reviews - Standard Membership</div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="thead-dark">
                                    <th>Plan</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($standardPlanReviews as $reviews)
                            
                            <tr>
                                <td>{{ $reviews->plan }}</td>
                                <td>{{ $reviews->rating }}</td>
                                <td>{{ $reviews->comment }}</td>
                                <td>{{ $reviews->user_id }}</td>
                               
                            </tr>
                            
                            
                            @endforeach
                            </tbody>
                        </table>
                        {{ $standardPlanReviews->links() }}
                        </div>
                        <div id="one" role="tabpanel" class="tab-pane fade">
                        <div class="alert alert-info">Reviews - Premium Membership</div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="thead-dark">
                                    <th>Plan</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($premium as $reviews)
                            
                            <tr>
                                <td>{{ $reviews->plan }}</td>
                                <td>{{ $reviews->rating }}</td>
                                <td>{{ $reviews->comment }}</td>
                                <td>{{ $reviews->user_id }}</td>
                               
                            </tr>
                            
                            
                            @endforeach
                            </tbody>
                        </table>
                        {{ $premium->links() }}
                        </div>
                        <div id="two" role="tabpanel" class="tab-pane fade">
                        <div class="alert alert-info">Two</div>
                        </div>
                        <div id="three" role="tabpanel" class="tab-pane fade">
                        <div class="alert alert-info">Three</div>
                        </div>
                        <div id="contact" role="tabpanel" class="tab-pane fade">
                        <div class="alert alert-info">Reviews - VIP Membership</div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="thead-dark">
                                    <th>Plan</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($vip as $reviews)
                            
                            <tr>
                                <td>{{ $reviews->plan }}</td>
                                <td>{{ $reviews->rating }}</td>
                                <td>{{ $reviews->comment }}</td>
                                <td>{{ $reviews->user_id }}</td>
                               
                            </tr>
                            
                            
                            @endforeach
                            </tbody>
                        </table>
                        {{ $vip->links() }}
                        </div>
                    </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush