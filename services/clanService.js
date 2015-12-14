app
        .factory('ClanService', function($resource) {

            var factory = {
                coc_api: $resource('https://set7z18fgf.execute-api.us-east-1.amazonaws.com/prod', {}),
                getInfosClan: function() {
                    return this.coc_api.get({route: 'getClanDetails', clanTag: '%23L2QCG0PY'});
                }

            };
            return factory;
        });