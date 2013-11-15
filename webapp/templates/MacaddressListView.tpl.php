<?php
	$this->assign('title','IT350 | Macaddresses');
	$this->assign('nav','macaddresses');

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
	.script("scripts/app/macaddresses.js").wait(function(){
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
	<i class="icon-th-list"></i> Macaddresses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="macaddressCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_MacaddressesId">Macaddresses Id<% if (page.orderBy == 'MacaddressesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ComputersId">Computers Id<% if (page.orderBy == 'ComputersId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MacAddress">Mac Address<% if (page.orderBy == 'MacAddress') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('macaddressesId')) %>">
				<td><%= _.escape(item.get('macaddressesId') || '') %></td>
				<td><%= _.escape(item.get('computersId') || '') %></td>
				<td><%= _.escape(item.get('macAddress') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="macaddressModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="macaddressesIdInputContainer" class="control-group">
					<label class="control-label" for="macaddressesId">Macaddresses Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="macaddressesId"><%= _.escape(item.get('macaddressesId') || '') %></span>
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
				<div id="macAddressInputContainer" class="control-group">
					<label class="control-label" for="macAddress">Mac Address</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="macAddress" placeholder="Mac Address" value="<%= _.escape(item.get('macAddress') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteMacaddressButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMacaddressButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Macaddress</button>
						<span id="confirmDeleteMacaddressContainer" class="hide">
							<button id="cancelDeleteMacaddressButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMacaddressButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="macaddressDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Macaddress
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="macaddressModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMacaddressButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="macaddressCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMacaddressButton" class="btn btn-primary">Add Macaddress</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
