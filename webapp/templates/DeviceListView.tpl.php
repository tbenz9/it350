<?php
	$this->assign('title','IT350 | Devices');
	$this->assign('nav','devices');

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
	.script("scripts/app/devices.js").wait(function(){
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
	<i class="icon-th-list"></i> Devices
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="deviceCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_DevicesId">Devices Id<% if (page.orderBy == 'DevicesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SerialNumber">Serial Number<% if (page.orderBy == 'SerialNumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DevicesType">Devices Type<% if (page.orderBy == 'DevicesType') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EmployeesId">Employees Id<% if (page.orderBy == 'EmployeesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('devicesId')) %>">
				<td><%= _.escape(item.get('devicesId') || '') %></td>
				<td><%= _.escape(item.get('serialNumber') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
				<td><%= _.escape(item.get('devicesType') || '') %></td>
				<td><%= _.escape(item.get('employeesId') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="deviceModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="devicesIdInputContainer" class="control-group">
					<label class="control-label" for="devicesId">Devices Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="devicesId" placeholder="Devices Id" value="<%= _.escape(item.get('devicesId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="serialNumberInputContainer" class="control-group">
					<label class="control-label" for="serialNumber">Serial Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="serialNumber" placeholder="Serial Number" value="<%= _.escape(item.get('serialNumber') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="modelInputContainer" class="control-group">
					<label class="control-label" for="model">Model</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="model" placeholder="Model" value="<%= _.escape(item.get('model') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="devicesTypeInputContainer" class="control-group">
					<label class="control-label" for="devicesType">Devices Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="devicesType" placeholder="Devices Type" value="<%= _.escape(item.get('devicesType') || '') %>">
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
		<form id="deleteDeviceButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteDeviceButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Device</button>
						<span id="confirmDeleteDeviceContainer" class="hide">
							<button id="cancelDeleteDeviceButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteDeviceButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="deviceDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Device
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="deviceModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveDeviceButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="deviceCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newDeviceButton" class="btn btn-primary">Add Device</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
