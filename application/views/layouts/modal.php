<div id="modalItem" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Crear Empleado</strong></h5>
        <button type="button" class="btn close btn-circle-xl" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formItem" action="Home/create">
            <div  class="form-group">
                <label for="">Nombre completo</label>
                <input name="item" type="text" class="form-control"  placeholder="Nombre" required>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col">
                <label for="">Cantidad</label>
                    <input name="mount" type="number" class="form-control"  placeholder="Cantidad" required>
                </div>
                <div class="col">
                <label for="">Estado</label>
                <select name="state" class="form-control">
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                </select>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="">Bodega</label>
                <select name="locate" class="form-control">
                    <option value="1">Centro</option>
                    <option value="2">Oriente</option>
                    <option value="3">Occidente</option>
                    <option value="4">Sur</option>
                </select>
            </div>
            <div class="form-group">
            <label for="">Observaciones</label>
                <textarea class="form-control" name="info" cols="30" rows="5"></textarea>
            </div>
        
        <div class="modal-footer mx-auto">
            <button type="submit" class="btn btn-dark btn-md">Guardar</button>
            <button class="btn btn-light btn-md">Cancelar</button>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>


<div id="modalCheck" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1><strong>¿Esta  Seguro de querer cambiar el estado?</strong></h1>
      </div>
      <div class="modal-footer">
        <button id="btnAccept" type="button" class="btn btn-dark">Guardar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
