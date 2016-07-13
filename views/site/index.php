<?php

/* @var $this yii\web\View */

$this->title = 'Carriages';
?>
<div class="site-index" ng-controller='MainCtrl'>
  <div class="row">
    <h3>Добавить</h1>
    <hr>
    <div class="col-md-6 col-sm-6">
      <form class="form" action="index.html" method="post">
        <div class="form-group">
          <label>Номер вагона:</label>
          <input type="input" class="form-control" name="name" ng-model='carriageNumber'>
        </div>
        <div class="form-group">
          <label>Владелец:</label>
          <select id="owners" class="form-control" ng-model="carriageOwner">
            <option value="{{ owner.id }}" ng-repeat='owner in owners'>{{ owner.name }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>Год выпуска</label>
          <input type="date" class="form-control" name="name" value="" ng-model="carriageKind">
        </div>
        <label style="color: red">{{ errorCarriage }}</label>
        <div class="form-group">
          <input type="button" class="btn btn-success" value="Добавить вагон" ng-click="addCarriage()">
        </div>
      </form>
    </div>
    <div class="col-md-6 col-sm-6">
      <form class="form" action="index.html" method="post">
        <div class="form-group">
          <label>Название компании</label>
          <input type="input" class="form-control" name="name" ng-model='ownerName'>
        </div>
        <div class="form-group">
          <label style="color: red">{{ errorOwner }}</label>
        </div>
        <div class="form-group">
          <input type="button" class="btn btn-success" value="Добавить" ng-click='addOwner()'>
        </div>
      </form>
    </div>

  </div>
  <div class="row" style="margin-top: 5%;">
    <h5 style="color: green">Для изменения владельца вагона клините по названию владельца</h5>

    <table class="table text-center">
      <thead>
        <th class="text-center">№ Вагона</th>
        <th class="text-center">Год выпуска</th>
        <th class="text-center">Владелец</th>
        <th></th>
      </thead>
      <tbody>
        <tr ng-repeat='carriage in carriages'>
          <td>{{ carriage.carriage_number }}</td>
          <td>{{ carriage.carriage_kind | date:'yyyy'}}</td>
          <td style="cursor: pointer" ng-click="change(carriage.carriage_number, carriage.carriage_owner)" ng-if="editCarriage !== carriage.carriage_number">{{ carriage.name }}</td>
          <td style="cursor: pointer" ng-if="editCarriage == carriage.carriage_number">
            <select class="form-control" ng-model="changeCarriageOwner" ng-change="updateCarriage(changeCarriageOwner)">
              <option value="{{ owner.id }}" ng-repeat='owner in owners'>{{ owner.name }}</option>
            </select>
          </td>
          <td>
            <button type="button" class='btn btn-danger' ng-click="removeCarriage(carriage.carriage_number)">Удалить</button>
            <!-- <button type="button" class='btn btn-info' ng-click="removeCarriage(carriage.carriage_number)">Изменить владельца</button> -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
