<!-- Aquí se diseña el PDF -->
<h1 class="text-md text-center"><?=$titulo?></h1>
<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width:30%'>
    <col style='width:30%'>
    <col style='width:15%'>
    <col style='width:15%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Datos del postulante</th>
      <th>Carrera</th>
      <th>Estado pago</th>
      <th>Método de pago</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['idCarrera']?></td>
          <td><?=$registro['nombres']?> <?=$registro['apellidos']?></td>
          <td><?=$registro['nombreCarrera']?></td>
          <td><?=$registro['estadoPago']?></td>
          <td><?=$registro['metodoPago']?></td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>