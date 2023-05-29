<x-layouts.admin.app title="Adicionar Pincode">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Pin-Code</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('pincodeProccessCreate') }}" method="post"
                                novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="validationCustom01">Pincode</label>
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
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Valor</label>
                                        <div class="input-group">
                                            <input name="count" max="980000" id="validationCustom02"
                                                class="form-control" type="number" placeholder="Setar valor"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Ativações</label>
                                        <div class="input-group">
                                            <input name="limit" id="validationCustom03" class="form-control"
                                                type="number" placeholder="Quantidade de ativações " required />
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tipo</label>
                                        <div class="input-group">
                                            <select name="type" class="form-control" id="validationCustom04"
                                                required>
                                                <option value="1">Gold</option>
                                                <option value="2">Cash</option>
                                                <option value="3">Coin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-9 offset-sm-10">
                                    <button class="btn btn-primary" type="submit">Criar Pincode</button>
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
                        <h5 class="text-white">Pincodes Criados</h5>
                    </div>
                    <br> <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col"><b>#</b></th>
                                    <th scope="col"><B>PINCODE</B></th>
                                    <th scope="col"><B>ITEM</B></th>
                                    <th scope="col"><B>VALOR</B></th>
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
                                @foreach ($pins as $pin)
                                    <tr>
                                        <th scope="row">{{ $pos }}</th>
                                        <td>
                                            <input class="form-control" type="text" value="{{ $pin->code }}"
                                                width="10px" id="copy-code{{ $pin->id }}" />
                                        </td>
                                        <td>
                                            {{ $pin->item_name }}
                                        </td>
                                        <td>
                                            {{ number_format($pin->item_count) }}
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
                                            <button type="submit" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenterDelete"
                                                onclick="modalDelete('{{ $pin->id }}', '{{ $pin->item_name }}', '{{ $pin->item_count }}')">
                                                <i data-feather="trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $pos++;
                                    @endphp
                                @endforeach
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

            const modalDelete = (id, name, value) => {
                const url = "{{ route('itemcodeProccessDelete', ['id' => '$__ID']) }}";
                $('#formActionDelete').attr('action', url.replace('%24__ID', id));
                $('.deleteMldalBody').html(
                    `Você realmente deseja deletar <b>${new Intl.NumberFormat('en-IN').format(value)} de ${name}</b> ? Esta ação é irreversivel`
                );
            }
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('admin/js/clipboard/clipboard-script.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
