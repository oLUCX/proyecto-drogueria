<!-- resources/views/partials/editModal.blade.php -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="userId" name="userId">
                    <div class="form-group">
                        <label for="code">Código</label>
                        <select class="form-control" id="code" name="code">
                            {{-- Opciones GetUsers --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="github">GitHub</label>
                        <input type="text" class="form-control" id="github" name="github">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
