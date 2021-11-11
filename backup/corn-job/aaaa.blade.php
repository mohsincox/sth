@extends('blades.base')

@section('page title', 'Index')

@section('innerbanner')
    <!-- innerbanner -->
    {{-- <div class="agileits-inner-banner">

    </div> --}}
    <!-- //innerbanner -->
@endsection

@section('breadcrumbs')
@endsection

@section('horizontal tab')

@endsection
@section('css')
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/travel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tool-tip.css')}}">
    <link rel="stylesheet" href="{{ asset('css/myprofile-style.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endsection

@section('vertical tab')
    <div class="container">
        <h2>Auto Recharge</h2>
        <div class="profile">
            <!--<div class="row">-->
            <!--    <div class="col-md-12 col-lg-12">-->
            <!--        <div class="text-center">-->
            <!--            <img class="avatar" src="images/profile-images/avatar.png" alt="">-->
            <!--            <p class="username">{{ $user->name }}</p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="row">
                <div class="col-md-6 h-100">
                    <!-- <ul class="nav nav-pills nav-stacked p-tabs">
                        <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                        <li><a data-toggle="tab" href="#security1">Security</a></li>
                        <li><a href="/myprofile/wallet">Wallet</a></li>
                    </ul> -->
                    <h2>Recherge Info</h2>

					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

				</div>
                <div class="col-md-6">
                    <div class="tab-content">
                        <div id="profile" class="tab-pane fade in active">
                            <div class="p-container">
                                <form class="form-horizontal" action="">
                                    
                                    <div class="required form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="mobile">Mobile:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='text' class="form-control"  id='mobile' placeholder="Enter Mobile" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('mobile') }}
							    		    </span>
								        </div>
									</div>
									
									<div class="required form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="balance">Balance:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='number' class="form-control"  id='balance' placeholder="Enter Balance" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('balance') }}
							    		    </span>
								        </div>
									</div>
									
									<div class="required form-group {{ $errors->has('recharge_date') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="recharge_date">Date:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='text' class="form-control"  id='datetimepicker1' placeholder="Enter Date" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('recharge_date') }}
							    		    </span>
								        </div>
									</div>
									
									<div class="required form-group {{ $errors->has('recharge_time') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="recharge_time">Time:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='text' class="form-control"  id='datetimepicker3' placeholder="Enter Time" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('recharge_time') }}
							    		    </span>
								        </div>
									</div>
									
									<div class="required form-group {{ $errors->has('operator') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="operator">Operator:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='text' class="form-control"  id='operator' placeholder="Enter Operator" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('operator') }}
							    		    </span>
								        </div>
									</div>
									
									<div class="required form-group {{ $errors->has('circle') ? 'has-error' : ''}}">
								        <label class="control-label col-xs-3 col-sm-3" for="circle">Circle:</label>
								        <div class="col-xs-9 col-sm-9">
							    	        <input type='text' class="form-control"  id='circle' placeholder="Enter Circle" />
							    	        <span class="text-danger">
							    			    {{ $errors->first('circle') }}
							    		    </span>
								        </div>
									</div>
									
                                    <!-- <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Your Email:</label>
                                        <div class="col-sm-10 ">
                                            <div class="under-line">
                                                <p class="text-info">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Phone Number:</label>
                                        <div class="col-sm-10 ">
                                            <div class="under-line">
                                                <p class="text-info">{{$user->mobile}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Your Address:</label>
                                        <div class="col-sm-10 ">
                                            <div class="under-line">
                                                <p class="text-info">{{$user->address}} </p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            <button class="btn edit-btn" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="security" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="wallet" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>History</h2>
        <div class="history">
            <div class="service">
                <div class="s-item s-active">
                    <a href="#">
                        <img src="images/profile-images/Group-8.png" alt="">
                        <p>Mobile</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-7.png" alt="">
                        <p>DTH</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-6.png" alt="">
                        <p>Data Card</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-5.png" alt="">
                        <p>Electricity</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-4.png" alt="">
                        <p>Line Land</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-3.png" alt="">
                        <p>Board Band</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-2.png" alt="">
                        <p>Gas</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group.png" alt="">
                        <p>Water</p>
                    </a>
                </div>
                <div class="s-item">
                    <a href="#">
                        <img src="images/profile-images/Group-1.png" alt="">
                        <p>Bus Ticket</p>
                    </a>
                </div>

            </div>
            <div class="row space-top">
                <div class="col-md-12 col-lg-12 ">
                    <div class="inner-addon left-addon search">
                        <i class="glyphicon glyphicon-search"></i>
                        <input type="text" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row space-top">
                <div class="col-md-12 col-lg-12 text-center">

                    <h4>
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        DECEMBER, 2018
                        <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                    </h4>

                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-20">
                    <div class="h-item">
                        <div class="row ">
                            <div class="col-sm-6 text-left">
                                <h4 class="h-i-title"> dec/02/2018</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4 class="text-id">ID: 123456</h4>
                            </div>
                        </div>
                        <div class="b-info ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Total Bill</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="money">$32</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Payment</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">CREDIT CARD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Phone</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">612-434-5304</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <span class="i-title">Email</span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span class="i-info">mshelby@tamu.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Review</h2>
        <div class="review">
            <div class="comment clearfix">
                <div class="username ">
                    Anna
                </div>
                <div class="text-content">
                    Thank you - look forward to making memories together
                </div>
            </div>
            <div class="comment clearfix">
                <div class="username">
                    Anna
                </div>
                <div class="text-content">
                    Thank you - look forward to making memories together
                </div>
            </div>
            <div class="c-text">
                <textarea name="" id="" cols="30" rows="3" placeholder="Add your Review about Zapwallet"></textarea>
                <a href="">
                    <img src="images/profile-images/send.png" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('tab title')
    Plan
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            //Vertical Tab
            $('#parentVerticalTab').easyResponsiveTabs({
                type: 'vertical', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo2');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#tab2").hide();
            $("#tab3").hide();
            $("#tab4").hide();
            $(".tabs-menu a").click(function(event){
                event.preventDefault();
                var tab=$(this).attr("href");
                $(".tab-grid").not(tab).css("display","none");
                $(tab).fadeIn("slow");
            });
        });
    </script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker,#datepicker1" ).datepicker();
        });
    </script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: "YYYY-MM-DD"
            });
        });
    </script>
@endsection

@section('header-right')
    <div class=" header-right">
        <div class="banner">
            <s-banner></s-banner>
        </div>
    </div>
@endsection


