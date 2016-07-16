var app = angular.module('Carriages', []);
app.run( function run($http){
    $http.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");
    $http.defaults.headers.put['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");

    // $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
});
