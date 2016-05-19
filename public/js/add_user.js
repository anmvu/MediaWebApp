var selected_button;
//Add a user
function addUser() {
	//Prepending a user row
	$('<tr><td><input type="text" name="name" class="t-name" value="" required></td><td><input type="text" name="user" pattern="\d{14}" title="Has to be a 14 digit number" class="t-username" value="" required></td><td><input type="text" name="phonenum" class="t-phonenum" pattern="\d{10}" title="Enter 10 digit phone number" value="" required></td><td><input type="checkbox" class="t-auth"/></td><td><button class="btn btn-success user-submit" name="commit" type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"><button class="btn btn-danger" onclick="$(this).parent().parent().remove();"><span class="glyphicon glyphicon-remove" aria-hidden="true"></td></tr>').insertBefore('table > tbody > tr:first');
		//Bind an event to the new row's submit button
	$(".user-submit").bind("click", function() {
		selected_button = $(this);
		//Set names to javascript variables for clarity
		var fname = ($(this).parent().parent().children().find("input.t-name")[0].value.split(" ")[0]);
		var lname = ($(this).parent().parent().children().find("input.t-name")[0].value.split(" ")[1]);
		var uname = ($(this).parent().parent().children().find("input.t-username")[0].value);
		var phonenum = ($(this).parent().parent().children().find("input.t-phonenum")[0].value);
		var auth = ($(this).parent().parent().children().find("input.t-auth")[0].checked);
		//Change check button accordingly true/false : 1/0
		if (auth == false) {
			auth = 0;
		}
		else {
			auth = 1;
		}
		//Quick verfication test
		if (fname == '' || lname == '' || uname == '' || phonenum == '') {
			console.log("Insertion Failed Some Fields are Blank....!!");
		}
		else {
			//Insert into database with AJAX via ajax_funcs.php
			$.post("/users/add", {
					fname: fname,
					lname: lname,
					uname: uname,
					phonenum: phonenum,
					auth: auth,
					}, function(data) {
						//If there was an error
						if(!data.return) {
							//Consoling error for now
							console.log(data.return);
						}
						else {
							//Remove appended row
							selected_button.parent().parent().remove();
							//Append new row according to auth
							if(auth == 1) {
								$('<tr id="'+data.id+'"><td style="vertical-align:middle;"><a href="" name="first_name" id="first_name" data-type="text" data-pk="1" data-title="Enter First Name" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+fname+' </a><a href="#" name="last_name" id="last_name" data-type="text" data-pk="1" data-title="Enter Last Name" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+lname+'</a></td><td style="vertical-align:middle;">'+uname+'</td><td style="vertical-align:middle;"><a href="#" name="phone_num" id="phone_num" data-type="text" data-pk="1" data-title="Enter phone number" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+phonenum+'</a></td><td style="vertical-align:middle;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle;"><form class="form-horizontal" role="form" method="POST"><div class="form-group"><div class="col-lg-5 col-lg-offset-4" style="text-align:center"><input type="hidden" class="id" name="id" value="'+data.id+'"></input><button type="submit" class="btn btn-danger deactivate"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div></div></form></td></tr>').insertBefore('table > tbody > tr:first');
							}
							else {
								$('<tr id="'+data.id+'"><td style="vertical-align:middle;"><a href="" name="first_name" id="first_name" data-type="text" data-pk="1" data-title="Enter First Name" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+fname+' </a><a href="#" name="last_name" id="last_name" data-type="text" data-pk="1" data-title="Enter Last Name" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+lname+'</a></td><td style="vertical-align:middle;">'+uname+'</td><td style="vertical-align:middle;"><a href="#" name="phone_num" id="phone_num" data-type="text" data-pk="1" data-title="Enter phone number" class="editable editable-click pUpdate" data-url="users/edit/'+data.id+'" style="display: inline;">'+phonenum+'</a></td><td style="vertical-align:middle;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td><td style="vertical-align:middle;"><form class="form-horizontal" role="form" method="POST"><div class="form-group"><div class="col-lg-5 col-lg-offset-4" style="text-align:center"><input type="hidden" class="id" name="id" value="'+data.id+'"></input><button type="submit" class="btn btn-danger deactivate"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div></div></form></td></tr>').insertBefore('table > tbody > tr:first');
							}
							$(function () {
								$('form').on('submit', function (e) {
							      e.preventDefault();
							      if (confirm("Are you sure you want to delete?")) {								    
								      var this_id = this.id.value;
								    	$.ajaxSetup({
									        headers: {
									            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									        }
											});
								    console.log(this_id);
										$.ajax({
										    url:'/users',
										    type: 'post',
										    data: {'id': this_id},
										    success:function(data){
										    	console.log(data);
										    	$("#"+this_id).remove();
										    	// $("#"+this_id).remove();
										 	}
										});
									}
									else{return false;}
							    });
							});
							$.fn.editable.defaults.mode = 'inline';
							$.ajaxSetup({
					        headers: {
					            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					        }
					    });

					    $('#user').editable({
						    success: function(response, newValue) {
						    	console.log(response);
						        if(response.status == 'error') return response.msg; //msg will be shown in editable form
						    }
					    });

					    $('.pUpdate').editable({
					        validate: function(value) {
					            if($.trim(value) == '')
					                return 'Value is required.';
					        },
					        type: 'text',
					        title: 'Edit Comment',
					        placement: 'top',
					        send:'always',
					        ajaxOptions: {
					            dataType: 'json',
					            type: 'post'
					        }
					    });
						}	
					});
		}
	}); 	
	}