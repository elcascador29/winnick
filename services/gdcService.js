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
                this.strategy = null;
                this.enemy_position = null;
                this.second_attack = null;
                this.strategy2 = null;
                this.enemy_position2 = null;
//                this.cdc_full = null;
            }
            
            function DateGdc(){
                var today = new Date();

                this.date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' 00:00:00';
                this.timezone = "Europe/Paris";
                this.timezone_type = 3;
            }

            var factory = {
                getAll: $resource('../api/web/gdc/getAll', {}),
                save_gdc: $resource('../api/web/gdc/save', {}),
                war: $resource('../api/web/gdc/war/:id', {id:'@id'}),
                war_info: $resource('../api/web/gdc/warInfo/:id', {id:'@id'}),
                war_save: $resource('../api/web/gdc/saveWar', {}),
                gdc_stats: $resource('../api/web/gdc/stats', {}),
                gdc_stats_users: $resource('../api/web/gdc/statsUsers', {}),
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
                },
                getStats: function(){
                    return this.gdc_stats.get({});
                },
                getStatsUsers: function(){
                    return this.gdc_stats_users.get({});
                }
            };
            return factory;
        });