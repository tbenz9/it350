<?php
	$this->assign('title','IT350 | Phones');
	$this->assign('nav','phones');

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
	.script("scripts/app/phones.js").wait(function(){
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
	<i class="icon-th-list"></i> Phones
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="phoneCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_PhonesId">Phones Id<% if (page.orderBy == 'PhonesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SerialNumber">Serial Number<% if (page.orderBy == 'SerialNumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ip">Ip<% if (page.orderBy == 'Ip') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SwitchPort">Switch Port<% if (page.orderBy == 'SwitchPort') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_EmployeesId">Employees Id<% if (page.orderBy == 'EmployeesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('phonesId')) %>">
				<td><%= _.escape(item.get('phonesId') || '') %></td>
				<td><%= _.escape(item.get('serialNumber') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
				<td><%= _.escape(item.get('ip') || '') %></td>
				<td><%= _.escape(item.get('switchPort') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('employeesId') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="phoneModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="phonesIdInputContainer" class="control-group">
					<label class="control-label" for="phonesId">Phones Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="phonesId" placeholder="Phones Id" value="<%= _.escape(item.get('phonesId') || '') %>">
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
				<div id="ipInputContainer" class="control-group">
					<label class="control-label" for="ip">Ip</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ip" placeholder="Ip" value="<%= _.escape(item.get('ip') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="switchPortInputContainer" class="control-group">
					<label class="control-label" for="switchPort">Switch Port</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="switchPort" placeholder="Switch Port" value="<%= _.escape(item.get('switchPort') || '') %>">
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
		<form id="deletePhoneButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePhoneButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Phone</button>
						<span id="confirmDeletePhoneContainer" class="hide">
							<button id="cancelDeletePhoneButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePhoneButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="phoneDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Phone
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="phoneModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePhoneButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="phoneCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPhoneButton" class="btn btn-primary">Add Phone</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
