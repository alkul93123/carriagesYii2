'use strict';

app.controller('MainCtrl', function($scope, $http) {
  console.log("MainCtrl was started!!!");

  $scope.carriages = '';
  $scope.owners = ''
  $scope.editCarriage = '';
  $scope.carriageOwner = '';

  var getCarriages = function () {

    $http.get("/carriages")
      .then(function (response) {
        console.log(response.data);
        $scope.carriages = response.data.carriages;

      })
  }

  var getOwners = function () {

    $http.get("/owners")
      .then(function (response) {
        console.log(response.data);
        $scope.owners = response.data.owners;
      })
  }

  $scope.addOwner = function () {

    if ($scope.ownerName !== undefined && $scope.ownerName.length) {
      var transform = function(data){
          return $.param(data);
      }

      var request = {
        method: 'POST',
        url: '/owners',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        transformRequest: transform,
        data: {
          name: $scope.ownerName
        }
      }

      $http(request)
        .success(function (response) {
            getOwners();
            $scope.ownerName = '';
            $scope.errorOwner = '';
        })
        .error(function (response) {
          console.log(response);
          // Здесть по уму нужно отловить ошибку
        })
    } else {

      $scope.errorOwner = 'Поле не может быть пустым';
    }

  }

  $scope.addCarriage = function () {

    if ($scope.carriageNumber == undefined || $scope.carriageOwner == undefined || $scope.carriageKind == undefined) {
      $scope.errorCarriage = 'Все поля должны быть заполнены';
      return;
    }
    if (!$scope.carriageNumber.match(/^\d+$/) || $scope.carriageNumber.length !== 8) {
      $scope.errorCarriage = 'Номер должен быть 8ми значным, и состоять только из цифр';
      return;
    }

    var date = new Date($scope.carriageKind);

    var transform = function(data){
        return $.param(data);
    }

    var request = {
      method: 'POST',
      url: '/carriages',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      transformRequest: transform,
      data: {
        carriage_number: $scope.carriageNumber,
        carriage_kind: date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate(),
        carriage_owner: $scope.carriageOwner
      }
    }

    $http(request)
      .success(function (response) {
        console.log(response.data);
          $scope.errorCarriage = '';
          $scope.carriageNumber = '';
          $scope.carriageKind = '';
          $scope.carriageOwner = '';
          getCarriages();
      })
      .error(function (response) {
        $scope.errorCarriage = response.error;
      })


  }

  $scope.removeCarriage = function (carriage) {

    $http.delete("/carriages/" + carriage.id)
      .success(function (response) {
        console.log(response.data);
        getCarriages();
      })
  }

  $scope.change = function (carriage) {
    $scope.editCarriage = carriage.carriage_number;
    $scope.carriageOwner = carriage.carriage_owner;
    console.log(  $scope.carriageOwner);
    getCarriages();
  }

  $scope.updateCarriage = function (owner, carriage) {
    console.log(carriage);
    if (owner !== undefined && owner.length) {
      console.log("test");
      var transform = function(data){
          return $.param(data);
      }

      var request = {
        method: 'PUT',
        url: '/carriages/' + carriage.id,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        transformRequest: transform,
        data: {
          carriage_owner: owner
        }
      }

    $http(request)
      .success(function (response) {
        $scope.editCarriage = "";
        getCarriages();
      })
      .error(function (response) {
        // Здесь можно вывести ошибку, если данные не обновились
      })
    }
  }

  getCarriages();
  getOwners();
})
