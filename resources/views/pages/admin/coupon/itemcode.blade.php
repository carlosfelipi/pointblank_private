<x-layouts.admin.app title="Adicionar Itemcode">
    <x-slot:css>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/select2.css') }}">
    </x-slot:css>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Itemcode</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('itemcodeProccessCreate') }}" method="post"
                                novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="validationCustom01">Itemcode</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="validationCustom01" name="code"
                                                    class="form-control" placeholder="Itemcode" required />
                                                <div class="input-group-append">
                                                    <button style="margin-top: 6px;" class="btn btn-primary btn-sm"
                                                        type="button" onclick="newCode();">Gerar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Escolha Um Item</label>
                                            <div class="form-group">
                                                <select class="js-example-basic-single col-sm-12"
                                                    id="validationCustom02" name="item" required>
                                                    @foreach ($itens as $item)
                                                        <option value="{{ $item->item_id }}">
                                                            {{ $item->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Qntd. Ativações</label>
                                            <input class="form-control" id="validationCustom04" type="number"
                                                placeholder="Ex: 250" name="limit" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tipo Do Item</label>
                                            <select class="form-control" id="validationCustom05" name="category"
                                                required>
                                                <option value="2">Dias</option>
                                                <option value="1">Unidades</option>
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
                                <div class="col-sm-9 offset-sm-10">
                                    <button class="btn btn-primary" type="submit">Criar Itemcode</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Itemcodes Criados</h5>
                    </div>
                    <br> <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col"><b>#</b></th>
                                    <th scope="col"><B>ITEMCODE</B></th>
                                    <th scope="col"><b>ITEM ID</b></th>
                                    <th scope="col"><B>ITEM</B></th>
                                    <th scope="col"><B>DURAÇÃO</B></th>
                                    <th scope="col"><b>STATUS</b></th>
                                    <th scope="col"><B>CRIADOR</B></th>
                                    <th scope="col"><b>LIMITE</b></th>
                                    <th scope="col"><b>AÇÕES</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $pos = ($pins->currentPage() - 1) * $pins->perPage() + 1;
                                @endphp
                                @forelse ($pins as $pin)
                                    <tr>
                                        <th scope="row">{{ $pos }}</th>
                                        <td>
                                            <input class="form-control" type="text" value="{{ $pin->code }}"
                                                width="10px" id="copy-code{{ $pin->id }}" />
                                        </td>
                                        <td>
                                            {{ $pin->item_id }}
                                        </td>
                                        <td>
                                            {{ $pin->item_name }}
                                        </td>
                                        <td>
                                            {{ $mItem->countDayItem($pin->item_count) }}
                                        </td>
                                        <td>
                                            @if ($pin->limit == 0)
                                                Esgotado
                                            @else
                                                Ativo
                                            @endif
                                        </td>
                                        <td>
                                            {{ $pin->author }}
                                        </td>
                                        <td>
                                            {{ number_format($pin->limit) }}
                                        </td>

                                        <td style="display:flex;">
                                            <button class="btn btn-primary btn-xs btn-clipboard" type="button"
                                                data-clipboard-action="copy"
                                                data-clipboard-target="#copy-code{{ $pin->id }}">
                                                <i data-feather="copy"></i>
                                            </button>
                                            &nbsp;
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenterDelete"
                                                onclick="modalDelete('{{ $pin->id }}', '{{ $pin->item_name }}')">
                                                <i data-feather="trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $pos++;
                                    @endphp
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">Nenhum cupom encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pins->links('components.vendor.pagination.default.bootstrap-5') }}
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
                        <h5 class="modal-title deleteModal">Remover Cupom</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form method="POST" id="formActionDelete">
                        @csrf
                        <div class="modal-body deleteMldalBody" style="text-align: center;">
                            Você realmente deseja deletar este cupom?
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
        <script>
            function newCode() {
                var chars = "ABCDEFGHIKKLNMOPQRSTUVWYZZ123456789101112131415161718192022";
                var cupon = 16;
                var prefix = "PBS-";
                for (var i = 0; i < cupon; i++) {
                    var randomNumber = Math.floor(Math.random() * chars.length);
                    prefix += chars.substring(randomNumber, randomNumber + 1);
                }
                document.getElementById('validationCustom01').value = prefix
            }

            const modalDelete = (id, name) => {
                const url = "{{ route('itemcodeProccessDelete', ['id' => '$__ID']) }}";
                $('#formActionDelete').attr('action', url.replace('%24__ID', id));
                $('.deleteMldalBody').html(`Você realmente deseja deletar <b>${name}</b> ? Esta ação é irreversivel`);
            }
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2-custom.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard-script.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
