var app = angular.module('app', [
	'ui.router'
]);

app.config(function($interpolateProvider, $locationProvider, $stateProvider) {
	$interpolateProvider.startSymbol('[[').endSymbol(']]');

	$locationProvider.html5Mode(true);

	var viewBlade = 'views/';

	$stateProvider
		.state('/', {
			controller: function($scope){

			},
			templateUrl: viewBlade + 'welcome'
		});
		
});

app.factory('Contact', ['$resource', function($resource) {
	return $resource('/api/v1/contact/:functionname/:id', {}, {
		update: { method: 'PUT' },
	});
}]);

app.controller('homeCtrl', function($scope, $log, Contact) {
	$scope.contacts = [];

	Contact.get(function(result) {
		$log.log('getting contacts');
		if(result.status) {
			$log.debug('contacts retreived:', result.data.length);
			$scope.contacts = result.data;
		}
		else {
			$log.error('No hay contactos');
		}
	});
});

app.controller('showCtrl', function($scope, $location, $log, Contact, contact) {
	$scope.contact = contact.status ? contact.data : [];

	$scope.contactActions = {
		edit: function() {
			Contact.update({id: $scope.contact.id}, $scope.contact, function(result) {
				$log.debug(result);
			})

			$scope.editing = false;
		},
		destroy: function() {
			Contact.remove({id: $scope.contact.id}, function(result) {
				if(result.status) {
					$location.path('/');
				}

				$log.debug(result);
			});
		}
	};

	
	// contact.$promise.then(function() {
	// 	if(contact.status) {
	// 		$scope.contact = contact.data;
	// 	}
	// });
})
