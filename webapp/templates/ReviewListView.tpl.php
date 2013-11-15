<?php
	$this->assign('title','IT350 | Reviews');
	$this->assign('nav','reviews');

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
	.script("scripts/app/reviews.js").wait(function(){
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
	<i class="icon-th-list"></i> Reviews
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="reviewCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Reviewer">Reviewer<% if (page.orderBy == 'Reviewer') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ReviewDate">Review Date<% if (page.orderBy == 'ReviewDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Rating">Rating<% if (page.orderBy == 'Rating') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('reviewer')) %>">
				<td><%= _.escape(item.get('reviewer') || '') %></td>
				<td><%if (item.get('reviewDate')) { %><%= _date(app.parseDate(item.get('reviewDate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('rating') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="reviewModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="reviewerInputContainer" class="control-group">
					<label class="control-label" for="reviewer">Reviewer</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="reviewer" placeholder="Reviewer" value="<%= _.escape(item.get('reviewer') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="reviewDateInputContainer" class="control-group">
					<label class="control-label" for="reviewDate">Review Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="reviewDate" type="text" value="<%= _date(app.parseDate(item.get('reviewDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ratingInputContainer" class="control-group">
					<label class="control-label" for="rating">Rating</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="rating" placeholder="Rating" value="<%= _.escape(item.get('rating') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteReviewButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteReviewButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Review</button>
						<span id="confirmDeleteReviewContainer" class="hide">
							<button id="cancelDeleteReviewButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteReviewButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="reviewDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Review
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="reviewModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveReviewButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="reviewCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newReviewButton" class="btn btn-primary">Add Review</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
