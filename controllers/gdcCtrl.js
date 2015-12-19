app
        .controller('gdcCtrl', ['$scope', 'UserService', 'GdcService', '$resource', '$location', '$state', '$stateParams'/*, 'Friends'*/, function ($scope, UserService, GdcService, $resource, $location, $state, $stateParams) {

                var currentState = $state.current.name;
                console.log(currentState);
                // Init
                if (currentState == 'gdc' && angular.isUndefined($scope.Gdcs)) {
                    $scope.Gdcs = GdcService.getAllGdc();
                    $scope.predicate = 'id';
                    $scope.reverse = true;
                } else if (currentState == 'war' && angular.isUndefined($scope.War)) {
                    $scope.war_info = GdcService.getInfoWar($stateParams.id);
                    $scope.War = GdcService.getWar($stateParams.id);
                    $scope.Users = UserService.getAllInUsers(null);
                    $scope.predicate = 'id';
                    $scope.reverse = false;
                }


                $scope.order = function (predicate) {
                    $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
                    $scope.predicate = predicate;
                };

                // fill the modal
                $scope.filled_gdc = function (id_gdc) {
                    $scope.id_gdc = id_gdc;

                    if (!angular.isUndefined($scope.Gdcs.listGdc)) {
                        $scope.Gdcs.listGdc.some(function (tmpGdc) {
                            if (tmpGdc.id == id_gdc) {
                                return $scope.edit_gdc = tmpGdc;
                            }
                        });
//                        $scope.username = $scope.listUsers.users[$scope.id_user].username;
                    }
                }

                // fill the war modal
                $scope.filled_war = function (id_user) {
                    $scope.id_user = id_user;

                    if (!angular.isUndefined($scope.War.users)) {
                        $scope.War.users.some(function (tmpUser) {
                            if (tmpUser.id_user == id_user) {
//                                console.log(tmpUser);
                                return $scope.edit_war_user = tmpUser;
                            }
                        });
//                        $scope.username = $scope.listUsers.users[$scope.id_user].username;
                    }
                }

                // save form GDC
                $scope.edit = function (gdc) {
                    var ret = GdcService.saveGdc(gdc);

                    // Ajout à la liste si nouvel utilisateur
                    if (gdc.id === null) {
                        gdc.id = ret.id_gdc;
                        $scope.Gdcs.listGdc.push(gdc);
                    }
//                    console.log(ret);

                    $('#myModal').modal('hide');
                }

                // save form détail GDC
                $scope.edit_war = function (war) {
                    var ret = GdcService.saveWarAttack(war, $stateParams.id);

                    // Ajout à la liste si nouvel utilisateur
//                    console.log(war.id);
                    if (angular.isUndefined(war.id)) {
                        $scope.War.users.push(war);
                    }
//                    $scope.War = GdcService.getWar($stateParams.id);
//                    console.log(war);

                    $('#myModal').modal('hide');
                }

                // clear form
                $scope.clear_gdc_form = function () {
                    console.log('clear');
                    return $scope.edit_gdc = GdcService.getNew();
                };

                // clear war form
                $scope.clear_war_form = function () {
                    return $scope.edit_war_user = GdcService.getWarNew();
                };

                $scope.getTimes = function (n) {
                    return new Array(n);
                };

                // convertit une date sql->html
                $scope.convertDate = function (stringDate) {
                    if (!angular.isUndefined(stringDate)) {

                        var dateOut = new Date(stringDate.substr(0, 10));

                        var day = dateOut.getDate();
                        var month = dateOut.getMonth() + 1;
                        var year = dateOut.getFullYear();

                        if (day < 10) {
                            day = '0' + day;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }
                        return day + '/' + month + '/' + year;
                    }
                };
            }]);