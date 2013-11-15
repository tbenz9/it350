<?php
	$this->assign('title','IT350 | Switches');
	$this->assign('nav','switches');

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
	.script("scripts/app/switches.js").wait(function(){
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
	<i class="icon-th-list"></i> Switches
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="switchCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_SwitchesId">Switches Id<% if (page.orderBy == 'SwitchesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Password">Password<% if (page.orderBy == 'Password') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Username">Username<% if (page.orderBy == 'Username') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Location">Location<% if (page.orderBy == 'Location') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Smart">Smart<% if (page.orderBy == 'Smart') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Managed">Managed<% if (page.orderBy == 'Managed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('switchesId')) %>">
				<td><%= _.escape(item.get('switchesId') || '') %></td>
				<td><%= _.escape(item.get('password') || '') %></td>
				<td><%= _.escape(item.get('username') || '') %></td>
				<td><%= _.escape(item.get('location') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('smart') || '') %></td>
				<td><%= _.escape(item.get('managed') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="switchModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="switchesIdInputContainer" class="control-group">
					<label class="control-label" for="switchesId">Switches Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="switchesId" placeholder="Switches Id" value="<%= _.escape(item.get('switchesId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="passwordInputContainer" class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="password" placeholder="Password" value="<%= _.escape(item.get('password') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="usernameInputContainer" class="control-group">
					<label class="control-label" for="username">Username</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="username" placeholder="Username" value="<%= _.escape(item.get('username') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="locationInputContainer" class="control-group">
					<label class="control-label" for="location">Location</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="location" placeholder="Location" value="<%= _.escape(item.get('location') || '') %>">
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
				<div id="smartInputContainer" class="control-group">
					<label class="control-label" for="smart">Smart</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="smart" placeholder="Smart" value="<%= _.escape(item.get('smart') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="managedInputContainer" class="control-group">
					<label class="control-label" for="managed">Managed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="managed" placeholder="Managed" value="<%= _.escape(item.get('managed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteSwitchButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteSwitchButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Switch</button>
						<span id="confirmDeleteSwitchContainer" class="hide">
							<button id="cancelDeleteSwitchButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteSwitchButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="switchDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Switch
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="switchModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveSwitchButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="switchCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSwitchButton" class="btn btn-primary">Add Switch</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
