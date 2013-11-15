<?php
	$this->assign('title','IT350 | Warranties');
	$this->assign('nav','warranties');

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
	.script("scripts/app/warranties.js").wait(function(){
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
	<i class="icon-th-list"></i> Warranties
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="warrantyCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_WarrantyId">Warranty Id<% if (page.orderBy == 'WarrantyId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Expires">Expires<% if (page.orderBy == 'Expires') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vendor">Vendor<% if (page.orderBy == 'Vendor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_WarrantyLength">Warranty Length<% if (page.orderBy == 'WarrantyLength') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PurchaseDate">Purchase Date<% if (page.orderBy == 'PurchaseDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_DevicesId">Devices Id<% if (page.orderBy == 'DevicesId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('warrantyId')) %>">
				<td><%= _.escape(item.get('warrantyId') || '') %></td>
				<td><%if (item.get('expires')) { %><%= _date(app.parseDate(item.get('expires'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('vendor') || '') %></td>
				<td><%= _.escape(item.get('warrantyLength') || '') %></td>
				<td><%if (item.get('purchaseDate')) { %><%= _date(app.parseDate(item.get('purchaseDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('devicesId') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="warrantyModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="warrantyIdInputContainer" class="control-group">
					<label class="control-label" for="warrantyId">Warranty Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="warrantyId"><%= _.escape(item.get('warrantyId') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="expiresInputContainer" class="control-group">
					<label class="control-label" for="expires">Expires</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="expires" type="text" value="<%= _date(app.parseDate(item.get('expires'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="vendorInputContainer" class="control-group">
					<label class="control-label" for="vendor">Vendor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vendor" placeholder="Vendor" value="<%= _.escape(item.get('vendor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="warrantyLengthInputContainer" class="control-group">
					<label class="control-label" for="warrantyLength">Warranty Length</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="warrantyLength" placeholder="Warranty Length" value="<%= _.escape(item.get('warrantyLength') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="purchaseDateInputContainer" class="control-group">
					<label class="control-label" for="purchaseDate">Purchase Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="purchaseDate" type="text" value="<%= _date(app.parseDate(item.get('purchaseDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="devicesIdInputContainer" class="control-group">
					<label class="control-label" for="devicesId">Devices Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="devicesId" placeholder="Devices Id" value="<%= _.escape(item.get('devicesId') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteWarrantyButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteWarrantyButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Warranty</button>
						<span id="confirmDeleteWarrantyContainer" class="hide">
							<button id="cancelDeleteWarrantyButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteWarrantyButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="warrantyDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Warranty
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="warrantyModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveWarrantyButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="warrantyCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newWarrantyButton" class="btn btn-primary">Add Warranty</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
