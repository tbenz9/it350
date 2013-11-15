<?php
	$this->assign('title','IT350 | Licenses');
	$this->assign('nav','licenses');

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
	.script("scripts/app/licenses.js").wait(function(){
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
	<i class="icon-th-list"></i> Licenses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="licenseCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_LicensesId">Licenses Id<% if (page.orderBy == 'LicensesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LicenseKey">License Key<% if (page.orderBy == 'LicenseKey') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NumberTimesActivated">Number Times Activated<% if (page.orderBy == 'NumberTimesActivated') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MaxActivation">Max Activation<% if (page.orderBy == 'MaxActivation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LicenseName">License Name<% if (page.orderBy == 'LicenseName') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_LicenseExpirationDate">License Expiration Date<% if (page.orderBy == 'LicenseExpirationDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ComputersId">Computers Id<% if (page.orderBy == 'ComputersId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('licensesId')) %>">
				<td><%= _.escape(item.get('licensesId') || '') %></td>
				<td><%= _.escape(item.get('licenseKey') || '') %></td>
				<td><%= _.escape(item.get('numberTimesActivated') || '') %></td>
				<td><%= _.escape(item.get('maxActivation') || '') %></td>
				<td><%= _.escape(item.get('licenseName') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%if (item.get('licenseExpirationDate')) { %><%= _date(app.parseDate(item.get('licenseExpirationDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('computersId') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="licenseModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="licensesIdInputContainer" class="control-group">
					<label class="control-label" for="licensesId">Licenses Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="licensesId"><%= _.escape(item.get('licensesId') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="licenseKeyInputContainer" class="control-group">
					<label class="control-label" for="licenseKey">License Key</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="licenseKey" placeholder="License Key" value="<%= _.escape(item.get('licenseKey') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numberTimesActivatedInputContainer" class="control-group">
					<label class="control-label" for="numberTimesActivated">Number Times Activated</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="numberTimesActivated" placeholder="Number Times Activated" value="<%= _.escape(item.get('numberTimesActivated') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="maxActivationInputContainer" class="control-group">
					<label class="control-label" for="maxActivation">Max Activation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="maxActivation" placeholder="Max Activation" value="<%= _.escape(item.get('maxActivation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="licenseNameInputContainer" class="control-group">
					<label class="control-label" for="licenseName">License Name</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="licenseName" placeholder="License Name" value="<%= _.escape(item.get('licenseName') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="licenseExpirationDateInputContainer" class="control-group">
					<label class="control-label" for="licenseExpirationDate">License Expiration Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="licenseExpirationDate" type="text" value="<%= _date(app.parseDate(item.get('licenseExpirationDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="computersIdInputContainer" class="control-group">
					<label class="control-label" for="computersId">Computers Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="computersId" placeholder="Computers Id" value="<%= _.escape(item.get('computersId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLicenseButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLicenseButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete License</button>
						<span id="confirmDeleteLicenseContainer" class="hide">
							<button id="cancelDeleteLicenseButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLicenseButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="licenseDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit License
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="licenseModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLicenseButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="licenseCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLicenseButton" class="btn btn-primary">Add License</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
