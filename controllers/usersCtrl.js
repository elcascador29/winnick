app
        .controller('usersCtrl', ['$scope', 'UserService', '$resource', '$location', '$state'/*, 'Friends'*/, function($scope, UserService, $resource, $location, $state) {

//                var listUsers = [];
//                UserService.getAllUsers().$promise.then(function(users) {
//                    console.log(users);
////                    angular.forEach(users, function(value, key) {
////                        listUsers.push(value);
////                    });
////                    console.log(listUsers);
//                });

                var currentState = $state.current.name;

                // Init
                if (angular.isUndefined($scope.listUsers)) {
//                    console.log(currentState);
                    if (currentState == 'users-in') {
                        $scope.listUsers = UserService.getAllInUsers(null);
                    } else {
                        $scope.listUsers = UserService.getAllOutUsers(null);
                    }
                    $scope.hdvs=[1,2,3,4,5,6,7,8,9,10];
                    $scope.id_user = 0;
                    $scope.currentState = currentState;
                }


                $scope.getAllUsers = function() {
//                    console.log("ok");
                    UserService.getAllUsers();
//                    var listIdsShows = {24: 1973, dedawood: 1406, person: 1411, dexter: 1405, vikings: 44217, lost:4607, banshee: 41727, suits:37680};
//                    var listShows = [];
//
//                    angular.forEach(listIdsShows, function(value, key) {
//                        Shows.getShow(value).$promise.then(function(res) {
//                            listShows.push(res);
//                            $scope.shows = listShows;
//                            $scope.detail = false;
//                            $scope.list = true;
//                        });
//
//                    });
                }

                $scope.edit = function(user) {
                    var ret = UserService.saveUser(user);
//console.log(user);
//console.log(ret);
                    // Ajout à la liste si nouvel utilisateur
                    if (user.id === null && user.state == 1) {
//                        console.log('addUser');
//                        user.id=ret.id_user;
//                        console.log(user);
                        $scope.listUsers.users.push(user);
                    }
//                    console.log(ret);

                    $('#myModal').modal('hide');
                }

                /**
                 * Trie le tableau
                 * @param {type} field
                 * @returns {undefined}
                 */
                $scope.orderBy = function(field) {
                    $scope.listUsers = UserService.getAllUsers(field);
                }

                $scope.predicate = 'id';
                $scope.reverse = false;
                $scope.order = function(predicate) {
                    $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
                    $scope.predicate = predicate;
                };


                $scope.filled_user = function(id_user) {
                    $scope.id_user = id_user;

                    if (!angular.isUndefined($scope.listUsers.users)) {
                        $scope.listUsers.users.some(function(tmpUser) {
                            if (tmpUser.id == id_user) {
                                return $scope.edit_user = tmpUser;
                            }
                        });
//                        $scope.username = $scope.listUsers.users[$scope.id_user].username;
                    }
                }


                $scope.clear_user_form = function() {
                    console.log('clear');
                    return $scope.edit_user = UserService.getNew();
                }

//                $scope.getSeason = function(id, season_number) {
//                    Shows.getSeasons(id, season_number).$promise.then(function(season) {
//                        $scope.season = season;
//                        $scope.currentSeason = season_number;
//                    });
//                }

//                if (currentState === 'shows.show') {
//                    $scope.getShow($state.params.id);
//                } else {
//                    $scope.getShows();
//                }


                // convertit une date sql->html
                $scope.convertDate = function(stringDate) {
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