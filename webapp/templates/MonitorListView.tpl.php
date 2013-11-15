<?php
	$this->assign('title','IT350 | Monitors');
	$this->assign('nav','monitors');

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
	.script("scripts/app/monitors.js").wait(function(){
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
	<i class="icon-th-list"></i> Monitors
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="monitorCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_MonitorsId">Monitors Id<% if (page.orderBy == 'MonitorsId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SerialNumber">Serial Number<% if (page.orderBy == 'SerialNumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ScreenSize">Screen Size<% if (page.orderBy == 'ScreenSize') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ComputersId">Computers Id<% if (page.orderBy == 'ComputersId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('monitorsId')) %>">
				<td><%= _.escape(item.get('monitorsId') || '') %></td>
				<td><%= _.escape(item.get('serialNumber') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
				<td><%= _.escape(item.get('screenSize') || '') %></td>
				<td><%= _.escape(item.get('computersId') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="monitorModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="monitorsIdInputContainer" class="control-group">
					<label class="control-label" for="monitorsId">Monitors Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="monitorsId" placeholder="Monitors Id" value="<%= _.escape(item.get('monitorsId') || '') %>">
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
				<div id="screenSizeInputContainer" class="control-group">
					<label class="control-label" for="screenSize">Screen Size</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="screenSize" placeholder="Screen Size" value="<%= _.escape(item.get('screenSize') || '') %>">
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
		<form id="deleteMonitorButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMonitorButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Monitor</button>
						<span id="confirmDeleteMonitorContainer" class="hide">
							<button id="cancelDeleteMonitorButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMonitorButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="monitorDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Monitor
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="monitorModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMonitorButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="monitorCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMonitorButton" class="btn btn-primary">Add Monitor</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
