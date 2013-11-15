/**
 * backbone model definitions for IT350
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {         
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			}
			else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			}
			else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}

		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Computer Backbone Model
 */
model.ComputerModel = Backbone.Model.extend({
	urlRoot: 'api/computer',
	idAttribute: 'computersId',
	computersId: '',
	hostname: '',
	operatingSystem: '',
	motherboard: '',
	ram: '',
	assignmentDate: '',
	upgradeDate: '',
	employeesId: '',
	defaults: {
		'computersId': null,
		'hostname': '',
		'operatingSystem': '',
		'motherboard': '',
		'ram': '',
		'assignmentDate': new Date(),
		'upgradeDate': new Date(),
		'employeesId': ''
	}
});

/**
 * Computer Backbone Collection
 */
model.ComputerCollection = model.AbstractCollection.extend({
	url: 'api/computers',
	model: model.ComputerModel
});

/**
 * Device Backbone Model
 */
model.DeviceModel = Backbone.Model.extend({
	urlRoot: 'api/device',
	idAttribute: 'devicesId',
	devicesId: '',
	serialNumber: '',
	model: '',
	devicesType: '',
	employeesId: '',
	defaults: {
		'devicesId': null,
		'serialNumber': '',
		'model': '',
		'devicesType': '',
		'employeesId': ''
	}
});

/**
 * Device Backbone Collection
 */
model.DeviceCollection = model.AbstractCollection.extend({
	url: 'api/devices',
	model: model.DeviceModel
});

/**
 * Employee Backbone Model
 */
model.EmployeeModel = Backbone.Model.extend({
	urlRoot: 'api/employee',
	idAttribute: 'employeesId',
	employeesId: '',
	employeeFirstname: '',
	employeeLastname: '',
	email: '',
	title: '',
	manager: '',
	officeNumber: '',
	hireDate: '',
	phoneNumber: '',
	defaults: {
		'employeesId': null,
		'employeeFirstname': '',
		'employeeLastname': '',
		'email': '',
		'title': '',
		'manager': '',
		'officeNumber': '',
		'hireDate': new Date(),
		'phoneNumber': ''
	}
});

/**
 * Employee Backbone Collection
 */
model.EmployeeCollection = model.AbstractCollection.extend({
	url: 'api/employees',
	model: model.EmployeeModel
});

/**
 * Harddrive Backbone Model
 */
model.HarddriveModel = Backbone.Model.extend({
	urlRoot: 'api/harddrive',
	idAttribute: 'harddrivesId',
	harddrivesId: '',
	capacity: '',
	serialNumber: '',
	model: '',
	computersId: '',
	defaults: {
		'harddrivesId': null,
		'capacity': '',
		'serialNumber': '',
		'model': '',
		'computersId': ''
	}
});

/**
 * Harddrive Backbone Collection
 */
model.HarddriveCollection = model.AbstractCollection.extend({
	url: 'api/harddrives',
	model: model.HarddriveModel
});

/**
 * License Backbone Model
 */
model.LicenseModel = Backbone.Model.extend({
	urlRoot: 'api/license',
	idAttribute: 'licensesId',
	licensesId: '',
	licenseKey: '',
	numberTimesActivated: '',
	maxActivation: '',
	licenseName: '',
	licenseExpirationDate: '',
	computersId: '',
	defaults: {
		'licensesId': null,
		'licenseKey': '',
		'numberTimesActivated': '',
		'maxActivation': '',
		'licenseName': '',
		'licenseExpirationDate': new Date(),
		'computersId': ''
	}
});

/**
 * License Backbone Collection
 */
model.LicenseCollection = model.AbstractCollection.extend({
	url: 'api/licenses',
	model: model.LicenseModel
});

/**
 * Macaddress Backbone Model
 */
model.MacaddressModel = Backbone.Model.extend({
	urlRoot: 'api/macaddress',
	idAttribute: 'macaddressesId',
	macaddressesId: '',
	computersId: '',
	macAddress: '',
	defaults: {
		'macaddressesId': null,
		'computersId': '',
		'macAddress': ''
	}
});

/**
 * Macaddress Backbone Collection
 */
model.MacaddressCollection = model.AbstractCollection.extend({
	url: 'api/macaddresses',
	model: model.MacaddressModel
});

/**
 * Monitor Backbone Model
 */
model.MonitorModel = Backbone.Model.extend({
	urlRoot: 'api/monitor',
	idAttribute: 'monitorsId',
	monitorsId: '',
	serialNumber: '',
	model: '',
	screenSize: '',
	computersId: '',
	defaults: {
		'monitorsId': null,
		'serialNumber': '',
		'model': '',
		'screenSize': '',
		'computersId': ''
	}
});

/**
 * Monitor Backbone Collection
 */
model.MonitorCollection = model.AbstractCollection.extend({
	url: 'api/monitors',
	model: model.MonitorModel
});

/**
 * Phone Backbone Model
 */
model.PhoneModel = Backbone.Model.extend({
	urlRoot: 'api/phone',
	idAttribute: 'phonesId',
	phonesId: '',
	serialNumber: '',
	model: '',
	ip: '',
	switchPort: '',
	employeesId: '',
	defaults: {
		'phonesId': null,
		'serialNumber': '',
		'model': '',
		'ip': '',
		'switchPort': '',
		'employeesId': ''
	}
});

/**
 * Phone Backbone Collection
 */
model.PhoneCollection = model.AbstractCollection.extend({
	url: 'api/phones',
	model: model.PhoneModel
});

/**
 * Review Backbone Model
 */
model.ReviewModel = Backbone.Model.extend({
	urlRoot: 'api/review',
	idAttribute: 'reviewer',
	reviewer: '',
	reviewDate: '',
	rating: '',
	defaults: {
		'reviewer': null,
		'reviewDate': new Date(),
		'rating': ''
	}
});

/**
 * Review Backbone Collection
 */
model.ReviewCollection = model.AbstractCollection.extend({
	url: 'api/reviews',
	model: model.ReviewModel
});

/**
 * Switch Backbone Model
 */
model.SwitchModel = Backbone.Model.extend({
	urlRoot: 'api/switch',
	idAttribute: 'switchesId',
	switchesId: '',
	password: '',
	username: '',
	location: '',
	model: '',
	smart: '',
	managed: '',
	defaults: {
		'switchesId': null,
		'password': '',
		'username': '',
		'location': '',
		'model': '',
		'smart': '',
		'managed': ''
	}
});

/**
 * Switch Backbone Collection
 */
model.SwitchCollection = model.AbstractCollection.extend({
	url: 'api/switches',
	model: model.SwitchModel
});

/**
 * Warranty Backbone Model
 */
model.WarrantyModel = Backbone.Model.extend({
	urlRoot: 'api/warranty',
	idAttribute: 'warrantyId',
	warrantyId: '',
	expires: '',
	vendor: '',
	warrantyLength: '',
	purchaseDate: '',
	devicesId: '',
	defaults: {
		'warrantyId': null,
		'expires': new Date(),
		'vendor': '',
		'warrantyLength': '',
		'purchaseDate': new Date(),
		'devicesId': ''
	}
});

/**
 * Warranty Backbone Collection
 */
model.WarrantyCollection = model.AbstractCollection.extend({
	url: 'api/warranties',
	model: model.WarrantyModel
});

