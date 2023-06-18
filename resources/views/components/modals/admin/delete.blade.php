<div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title deleteModal">{{ $titleModal ?? '' }}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" id="formActionDelete">
                @csrf
                <div class="modal-body deleteMldalBody" style="text-align: center;"></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button class="btn btn-danger" type="submit">
                        Deletar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
