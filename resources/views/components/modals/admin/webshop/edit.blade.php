<div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Item</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation modal-edit-center" method="post" novalidate="">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nome Do Item</label>
                            <input class="form-control itemName" name="name" id="validationCustom01" type="text"
                                placeholder="Nome do item" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Tag Do Item</label>
                            <select class="form-control" id="selectTag" name="tag" required>
                                <option value="1">Novo</option>
                                <option value="2">Promoção</option>
                                <option value="3">Recomendado</option>
                                <option value="4">Evento</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Tipo Do Item</label>
                            <div class="form-group">
                                <select class="form-control" id="selectType" name="type" required>
                                    <option value="1">Unidades</option>
                                    <option value="2">Dias</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Duração</label>
                            <input class="form-control itemCount" id="validationCustom06" type="number"
                                placeholder="Ex: 7 Dias" name="count" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Valor De Compra</label>
                            <input class="form-control itemPrice" id="validationCustom06" type="number"
                                placeholder="Ex: 30 Coins" name="price" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Slot</label>
                            <div class="form-group">
                                <select class="form-control" id="selectSlot" name="slot" required>
                                    <option value="1">Arma</option>
                                    <option value="2">Personagem/Mask</option>
                                    <option value="3">Item</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Status Do Item</label>
                            <div class="form-group">
                                <select class="form-control" id="selectState" name="state" required>
                                    <option value="1">Ativo</option>
                                    <option value="2">Desativado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
