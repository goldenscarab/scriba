<!-- Fenêtre Modal -->
<div class="modal fade" id="modalImportNote" tabindex="-1" role="dialog" aria-labelledby="modalDialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="modalAddLabel">Importation de notes</h5>
            </div>
            <form action="{{ url('/note/import/json') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback col-sm-offset-1 col-sm-10">
                            <div class="input-group">
                                <label class="control-label">Choix du fichier .json</label>
                                <input type="file" name="file-json">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button id="btn-import-file" type="submit" class="btn btn-primary">Importer</button>
                </div>
            </form>
        </div>
    </div>
</div>