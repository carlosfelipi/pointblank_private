<x-layouts.admin.app title="Adicionar Item Webshop">
    <x-slot:css>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/select2.css') }}">
    </x-slot:css>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Adicionar Item Webshop</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('webShopProccessCreate') }}" method="post"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Escolha Um Item Do Shop</label>
                                            <div class="form-group">
                                                <select class="js-example-basic-single col-sm-12" id="itemId"
                                                    name="item" onChange="selectValName()" required>
                                                    @foreach ($itens as $item)
                                                        <option value="{{ $item->item_id }}">
                                                            {{ $item->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Nome Do Item</label>
                                        <input class="form-control" name="name" id="itemName" type="text"
                                            placeholder="Nome Do Item" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tag Do Item</label>
                                            <select class="form-control" id="validationCustom03" name="tag"
                                                required>
                                                <option value="1">Novo</option>
                                                <option value="2">Promoção</option>
                                                <option value="3">Recomendado</option>
                                                <option value="4">Evento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tipo Do Item</label>
                                            <select class="form-control" id="validationCustom05" name="type"
                                                required>
                                                <option value="1">Unidades</option>
                                                <option value="2">Dias</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="inserir" class="form-group">
                                            <label>Duração</label>
                                            <input class="form-control" id="validationCustom06" type="number"
                                                placeholder="Ex: 7 Dias" name="count" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div id="inserir" class="form-group">
                                            <label>Valor De Compra</label>
                                            <input class="form-control" id="validationCustom06" type="number"
                                                placeholder="Ex: 30 Coins" name="price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Slot</label>
                                            <div class="form-group">
                                                <select class="form-control" id="validationCustom03" name="slot"
                                                    required>
                                                    <option value="1">Arma</option>
                                                    <option value="2">Personagem/Mask</option>
                                                    <option value="3">Item</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Imagem Do Item</label>
                                                <input class="form-control" type="file" name="image" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-9 offset-sm-10">
                                    <button class="btn btn-primary" type="submit">Criar Item</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:js>
        <script>
            function selectValName() {
                const select = document.getElementById('itemId');
                const option = select.options[select.selectedIndex];
                document.getElementById('itemName').value = option.text;
            }
            selectValName();
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2-custom.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard-script.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
