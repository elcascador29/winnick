app
        .controller('indexCtrl', ['$scope', 'GdcService', 'ClanService', '$resource', '$location', '$state'/*, 'Friends'*/, function ($scope, GdcService, ClanService, $resource, $location, $state) {
                $scope.stats = GdcService.getStats();
                $scope.stats_users = GdcService.getStatsUsers();

                $scope.clanInfos = ClanService.getInfosClan();
//                $scope.clanInfos = ClanService.getInfosClan();

//                console.log($scope.stats_users);
//                console.log($scope.clanInfos["clanDetails"]);

            }]);