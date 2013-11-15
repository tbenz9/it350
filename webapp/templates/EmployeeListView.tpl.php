<?php
	$this->assign('title','IT350 | Employees');
	$this->assign('nav','employees');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("bootstrap/js/bootstrap-datepicker.js")
	.script("bootstrap/js/bootstrap-timepicker.js")
	.script("bootstrap/js/bootstrap-combobox.js")
	.script("scripts/libs/underscore-min.js").wait()
	.script("scripts/libs/underscore.date.min.js")
	.script("scripts/libs/backbone-min.js")
	.script("scripts/app.js")
	.script("scripts/model.js").wait()
	.script("scripts/view.js").wait()
	.script("scripts/app/employees.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Employees
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="employeeCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_EmployeesId">Employees Id<% if (page.orderBy == 'EmployeesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EmployeeFirstname">Employee Firstname<% if (page.orderBy == 'EmployeeFirstname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EmployeeLastname">Employee Lastname<% if (page.orderBy == 'EmployeeLastname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Email">Email<% if (page.orderBy == 'Email') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Title">Title<% if (page.orderBy == 'Title') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Manager">Manager<% if (page.orderBy == 'Manager') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_OfficeNumber">Office Number<% if (page.orderBy == 'OfficeNumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_HireDate">Hire Date<% if (page.orderBy == 'HireDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PhoneNumber">Phone Number<% if (page.orderBy == 'PhoneNumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('employeesId')) %>">
				<td><%= _.escape(item.get('employeesId') || '') %></td>
				<td><%= _.escape(item.get('employeeFirstname') || '') %></td>
				<td><%= _.escape(item.get('employeeLastname') || '') %></td>
				<td><%= _.escape(item.get('email') || '') %></td>
				<td><%= _.escape(item.get('title') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('manager') || '') %></td>
				<td><%= _.escape(item.get('officeNumber') || '') %></td>
				<td><%if (item.get('hireDate')) { %><%= _date(app.parseDate(item.get('hireDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('phoneNumber') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="employeeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="employeesIdInputContainer" class="control-group">
					<label class="control-label" for="employeesId">Employees Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="employeesId" placeholder="Employees Id" value="<%= _.escape(item.get('employeesId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="employeeFirstnameInputContainer" class="control-group">
					<label class="control-label" for="employeeFirstname">Employee Firstname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="employeeFirstname" placeholder="Employee Firstname" value="<%= _.escape(item.get('employeeFirstname') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="employeeLastnameInputContainer" class="control-group">
					<label class="control-label" for="employeeLastname">Employee Lastname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="employeeLastname" placeholder="Employee Lastname" value="<%= _.escape(item.get('employeeLastname') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="emailInputContainer" class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="email" placeholder="Email" value="<%= _.escape(item.get('email') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titleInputContainer" class="control-group">
					<label class="control-label" for="title">Title</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="title" placeholder="Title" value="<%= _.escape(item.get('title') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="managerInputContainer" class="control-group">
					<label class="control-label" for="manager">Manager</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="manager" placeholder="Manager" value="<%= _.escape(item.get('manager') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="officeNumberInputContainer" class="control-group">
					<label class="control-label" for="officeNumber">Office Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="officeNumber" placeholder="Office Number" value="<%= _.escape(item.get('officeNumber') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hireDateInputContainer" class="control-group">
					<label class="control-label" for="hireDate">Hire Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="hireDate" type="text" value="<%= _date(app.parseDate(item.get('hireDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="phoneNumberInputContainer" class="control-group">
					<label class="control-label" for="phoneNumber">Phone Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="phoneNumber" placeholder="Phone Number" value="<%= _.escape(item.get('phoneNumber') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEmployeeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEmployeeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Employee</button>
						<span id="confirmDeleteEmployeeContainer" class="hide">
							<button id="cancelDeleteEmployeeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEmployeeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="employeeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Employee
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="employeeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEmployeeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="employeeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEmployeeButton" class="btn btn-primary">Add Employee</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
