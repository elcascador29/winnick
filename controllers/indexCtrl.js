app
        .controller('indexCtrl', ['$scope', 'GdcService', '$resource', '$location', '$state'/*, 'Friends'*/, function($scope, GdcService, $resource, $location, $state) {
                $scope.stats = GdcService.getStats();
                $scope.stats_users = GdcService.getStatsUsers();
                console.log($scope.stats_users);

            }]);