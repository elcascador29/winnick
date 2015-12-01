app
        .factory('GdcService', function($resource) {

            function Gdc() {
                this.id = null;
                this.enemy_team = null;
                this.stars = null;
                this.enemy_stars = null;
                this.date = new DateGdc();
            }
            
            function War(){
                this.user = null;
                this.first_attack = null;
                this.second_attack = null;
                this.strategy = null;
                this.cdc_full = null;
            }
            
            function DateGdc(){
                var today = new Date();

                this.date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' 00:00:00';
                this.timezone = "Europe/Paris";
                this.timezone_type = 3;
            }

            var factory = {
                getAll: $resource('../api/web/app_dev.php/gdc/getAll', {}),
                save_gdc: $resource('../api/web/app_dev.php/gdc/save', {}),
                war: $resource('../api/web/app_dev.php/gdc/war/:id', {id:'@id'}),
                war_info: $resource('../api/web/app_dev.php/gdc/warInfo/:id', {id:'@id'}),
                war_save: $resource('../api/web/app_dev.php/gdc/saveWar', {}),
                getAllGdc: function() {
                    return this.getAll.get({});
                },
                saveGdc: function(gdc) {
                    return this.save_gdc.save({gdc: gdc});
                },
                getWar: function(id) {
                    return this.war.save({id: id});
                },
                getInfoWar: function(id) {
                    return this.war_info.save({id: id});
                },
                saveWarAttack: function(war, id_gdc) {
                    return this.war_save.save({war: war, id_gdc:id_gdc});
                },
                getNew: function() {
                    return new Gdc();
                },
                getWarNew: function() {
                    return new War();
                }
            };
            return factory;
        });