<?php
	$this->assign('title','IT350 | Computers');
	$this->assign('nav','computers');

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
	.script("scripts/app/computers.js").wait(function(){
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
	<i class="icon-th-list"></i> Computers
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="computerCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_ComputersId">Computers Id<% if (page.orderBy == 'ComputersId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hostname">Hostname<% if (page.orderBy == 'Hostname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_OperatingSystem">Operating System<% if (page.orderBy == 'OperatingSystem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Motherboard">Motherboard<% if (page.orderBy == 'Motherboard') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ram">Ram<% if (page.orderBy == 'Ram') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_AssignmentDate">Assignment Date<% if (page.orderBy == 'AssignmentDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UpgradeDate">Upgrade Date<% if (page.orderBy == 'UpgradeDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EmployeesId">Employees Id<% if (page.orderBy == 'EmployeesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('computersId')) %>">
				<td><%= _.escape(item.get('computersId') || '') %></td>
				<td><%= _.escape(item.get('hostname') || '') %></td>
				<td><%= _.escape(item.get('operatingSystem') || '') %></td>
				<td><%= _.escape(item.get('motherboard') || '') %></td>
				<td><%= _.escape(item.get('ram') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%if (item.get('assignmentDate')) { %><%= _date(app.parseDate(item.get('assignmentDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('upgradeDate')) { %><%= _date(app.parseDate(item.get('upgradeDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('employeesId') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="computerModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="computersIdInputContainer" class="control-group">
					<label class="control-label" for="computersId">Computers Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="computersId" placeholder="Computers Id" value="<%= _.escape(item.get('computersId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hostnameInputContainer" class="control-group">
					<label class="control-label" for="hostname">Hostname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hostname" placeholder="Hostname" value="<%= _.escape(item.get('hostname') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="operatingSystemInputContainer" class="control-group">
					<label class="control-label" for="operatingSystem">Operating System</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="operatingSystem" placeholder="Operating System" value="<%= _.escape(item.get('operatingSystem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="motherboardInputContainer" class="control-group">
					<label class="control-label" for="motherboard">Motherboard</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="motherboard" placeholder="Motherboard" value="<%= _.escape(item.get('motherboard') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ramInputContainer" class="control-group">
					<label class="control-label" for="ram">Ram</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ram" placeholder="Ram" value="<%= _.escape(item.get('ram') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="assignmentDateInputContainer" class="control-group">
					<label class="control-label" for="assignmentDate">Assignment Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="assignmentDate" type="text" value="<%= _date(app.parseDate(item.get('assignmentDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="upgradeDateInputContainer" class="control-group">
					<label class="control-label" for="upgradeDate">Upgrade Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="upgradeDate" type="text" value="<%= _date(app.parseDate(item.get('upgradeDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="employeesIdInputContainer" class="control-group">
					<label class="control-label" for="employeesId">Employees Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="employeesId" placeholder="Employees Id" value="<%= _.escape(item.get('employeesId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteComputerButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteComputerButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Computer</button>
						<span id="confirmDeleteComputerContainer" class="hide">
							<button id="cancelDeleteComputerButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteComputerButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="computerDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Computer
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="computerModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveComputerButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="computerCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newComputerButton" class="btn btn-primary">Add Computer</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
