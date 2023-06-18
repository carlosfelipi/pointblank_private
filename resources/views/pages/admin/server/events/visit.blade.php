<x-layouts.admin.app title="Evento Visita">
    <x-slot:css>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/select2.css') }}">
    </x-slot:css>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Adicionar Evento De Visita</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('visitAddProcess') }}" method="post"
                                id="formVisit" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="validationCustom01">Título</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Ex:Bem vindo ao {{ env('APP_NAME') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Data de inicio</label>
                                        <input class="form-control" value="{{ date('Y-m-d') }}" type="date"
                                            data-language="pt" name="start_date" required />
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="validationCustom01">Data de
                                                encerramento</label>
                                            <input class="form-control" type="date" data-language="pt" name="end_date"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Escolha O Primeiro Item</label>
                                            <div class="form-group">
                                                <select class="js-example-basic-single col-sm-12" name="idOne"
                                                    id="goodsOne" onChange="selectIdItem()" required>
                                                    @foreach ($itens as $item)
                                                    <option
                                                        data-count_one="{{ $fnItem->countDayItemTwo($item->count) }}"
                                                        value="{{ $item->good_id }}">
                                                        {{ $item->item_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Escolha O Segundo Item</label>
                                            <div class="form-group">
                                                <select class="js-example-basic-single col-sm-12" name="idTwo"
                                                    id="goodsTwo" onChange="selectIdItem()" required>
                                                    @foreach ($itens as $item)
                                                    <option
                                                        data-count-two="{{ $fnItem->countDayItemTwo($item->count) }}"
                                                        value="{{ $item->good_id }}">
                                                        {{ $item->item_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Id Do Primeiro Item</label>
                                        <input class="form-control" type="number" id="idOne" required disabled
                                            required />
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="validationCustom01">Id Do Segundo
                                                Item</label>
                                            <input class="form-control" type="number" id="idTwo" required disabled
                                                required />
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Duração Do Primeiro
                                            Item</label>
                                        <input class="form-control" placeholder="Ex: 7 Dias" type="number"
                                            id="countOneInput" name="countOne" required />
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="validationCustom01">Duração Do Segundo
                                                Item</label>
                                            <input class="form-control" placeholder="Ex: 7 Dias" type="number"
                                                id="countTwoInput" name="countTwo" required />
                                        </div>
                                    </div>
                                </div> --}}
                                <br>
                                <div class="col-sm-9 offset-sm-10">
                                    <button class="btn btn-primary" type="submit">Criar Evento</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Evento De Visita Criados</h5>
                    </div>
                    <br> <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col"><b>#</b></th>
                                    <th scope="col"><b>TÍTULO</b></th>
                                    <th scope="col"><b>P.ITEM</b></th>
                                    <th scope="col"><b>DURAÇÃO P. ITEM</b></th>
                                    <th scope="col"><b>S. ITEM</b></th>
                                    <th scope="col"><b>DURAÇÃO S. ITEM</b></th>
                                    <th scope="col"><b>INÍCIO</b></th>
                                    <th scope="col"><b>FIM</b></th>
                                    <th scope="col"><b>AÇÕES</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visits as $item)
                                <tr>
                                    <td>1 </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $fnItem->itemName($item->goods1) }}</td>
                                    <td>{{ $fnItem->countDayItem($item->counts1) }}</td>
                                    <td>{{ $fnItem->itemName($item->goods2) }}</td>
                                    <td>{{ $fnItem->countDayItem($item->counts2) }}</td>
                                    <td>{{ $date->unconvertDateServerTwo($item->start_date) }}</td>
                                    <td>{{ $date->unconvertDateServerTwo($item->end_date) }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenterDelete"
                                            onclick="modalDelete('{{ $item->event_id }}')">
                                            <i data-feather="trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="100%">Nenhum evento de visita encontrado.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Delete Start --}}
        <div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterDelete" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title deleteModal">Remover De Visita</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form method="POST" id="formActionDelete">
                        @csrf
                        <div class="modal-body deleteMldalBody" style="text-align: center;">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-danger" type="submit">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Delete End --}}
    </div>
    <x-slot:js>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function selectIdItem() {
                const selectOne = document.getElementById("goodsOne");
                const selectTwo = document.getElementById("goodsTwo");
                document.getElementById("idOne").value = selectOne.value;
                document.getElementById("idTwo").value = selectTwo.value;
            }
            selectIdItem();
            const modalDelete = (id) => {
                const url = "{{ route('visitDeleteProcess', ['id' => '$__ID']) }}";
                $("#formActionDelete").attr("action", url.replace("%24__ID", id));
                $(".deleteMldalBody").html(
                    `Você realmente deseja deletar? Esta ação é irreversivel`
                );
            };
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2-custom.js') }}"></script>
    </x-slot:js>
    
</x-layouts.admin.app>