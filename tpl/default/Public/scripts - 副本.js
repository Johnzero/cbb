cultural.run(function($rootScope,  $location){
		    $rootScope.$on('$locationChangeSuccess', function() {
		        $rootScope.actualLocation = $location.path();
		    });
		   $rootScope.$watch(function () {return $location.path()}, function (newLocation, oldLocation) {
		        if($rootScope.actualLocation === newLocation) {
		            alert('Why did you use history back?');
		        }
		    });
		});
		cultural.run(function($rootScope){
		    $rootScope
		        .$on('$stateChangeSuccess',
		            function(event, toState, toParams, fromState, fromParams){
		                 console.log(fromState);
		        });
		})
		cultural.controller("onSearchSubmit", function ($scope, $http) {
		});
		cultural.controller("formController", function ($scope, $http) {
			$scope.formData = {};
			$scope.processForm = function() {
				$http({
			method  : 'POST',
			url     : "{:u('user/login/dologin')}",
			data    : $.param($scope.formData),  // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			})
		.success(function(data) {
		console.log(data);
		if (!data.success) {
		
			} else {
			$scope.message = data.message;
			}
			});
		};
		});




cultural.run(['$rootScope', '$state', '$stateParams',
	function ($rootScope,   $state,   $stateParams) {
		// It's very handy to add references to $state and $stateParams to the $rootScope
		// so that you can access them from any scope within your applications.For example,
		// <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
		// to active whenever 'contacts.list' or one of its decendents is active.
		$rootScope.$state = $state;
		$rootScope.$stateParams = $stateParams;
		if ($rootScope.$viewHistory) {
			$rootScope.$viewHistory.backView = null;
		}
	}
]);

cultural.directive('goBack', function($window){
	return function($scope, $element){
		$element.on('click', function(){
		$window.history.back();
	})}
});


$http.post('form.php', JSON.stringify(data)).success(function(){
				/*success callback*/
			});