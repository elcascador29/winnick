app
        .factory('UserService', function($resource) {

            function User() {
                this.id = null;
                this.username = null;
                this.firstname = null;
                this.age = null;
                this.city = null;
                this.link = null;
                this.description = null;
                this.state = 1;
                this.leaveReason = null;
                this.dateArrived = new DateArrived();
            }
            
            function DateArrived(){
                var today = new Date();

                this.date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' 00:00:00';
                this.timezone = "Europe/Paris";
                this.timezone_type = 3;
            }

            var factory = {
                users_in: $resource('../api/web/app_dev.php/users/getAll/In', {}),
                users_out: $resource('../api/web/app_dev.php/users/getAll/Out', {}),
                save_user: $resource('../api/web/app_dev.php/users/saveUser', {}),
                getAllInUsers: function(field) {
                    return this.users_in.get({field: field});
                },
                getAllOutUsers: function(field) {
                    return this.users_out.get({field: field});
                },
                saveUser: function(user) {
                    return this.save_user.save({user: user});
                },
                getNew: function() {
                    return new User();
                }

            };
            return factory;
        });