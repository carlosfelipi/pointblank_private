<x-layouts.admin.app title="Evento RankUp">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Adicionar Evento RankUp</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('rankupAddProcess') }}" method="post"
                                id="formRankUp" novalidate="">
                                @csrf
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
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Porcentagem De Gold</label>
                                        <input class="form-control" type="number" placeholder="Ex:5000%"
                                            name="percent_gp" id="percent_gp_input" required />
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="validationCustom01">Porcentagem De
                                                Exp</label>
                                            <input class="form-control" placeholder="Ex:5000%" type="number"
                                                name="percent_xp" id="percent_xp_input" required />
                                        </div>
                                    </div>
                                </div>
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
                        <h5 class="text-white">Evento RankUp Criados</h5>
                    </div>
                    <br> <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col"><b>#</b></th>
                                    <th scope="col"><b>INÍCIO</b></th>
                                    <th scope="col"><b>FIM</b></th>
                                    <th scope="col"><b>PORCETAGEM EXP</b></th>
                                    <th scope="col"><b>PORCETAGEM GOLD</b></th>
                                    <th scope="col"><b>AÇÕES</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rankUp as $item)
                                <tr>
                                    <td>1 </td>
                                    <td>{{ $date->unconvertDateServer($item->start_date) }}</td>
                                    <td>{{ $date->unconvertDateServer($item->end_date) }}</td>
                                    <td>{{ number_format($item->percent_xp) }}%</td>
                                    <td>{{ number_format($item->percent_gp) }}%</td>
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
                                    <td class="text-center" colspan="100%">Nenhum evento rankUp encontrado.</td>
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
                        <h5 class="modal-title deleteModal">Remover Evento RankUp</h5>
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
        <script>
            function formatNumberWithDot(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
    
            function removeDotFromNumber(number) {
                return number.replace(/\./g, "");
            }
    
            document
                .getElementById("percent_xp_input")
                .addEventListener("input", function (event) {
                    var value = event.target.value.replace(/\./g, "");
                    event.target.value = formatNumberWithDot(value);
                });
    
            document
                .getElementById("percent_gp_input")
                .addEventListener("input", function (event) {
                    var value = event.target.value.replace(/\./g, "");
                    event.target.value = formatNumberWithDot(value);
                });
    
            document
                .getElementById("formRankUp")
                .addEventListener("submit", function () {
                    var percentXpInput =
                        document.getElementById("percent_xp_input");
                    var percentGpInput =
                        document.getElementById("percent_gp_input");
    
                    percentXpInput.value = removeDotFromNumber(
                        percentXpInput.value
                    );
                    percentGpInput.value = removeDotFromNumber(
                        percentGpInput.value
                    );
                });
    
            const modalDelete = (id) => {
                const url = "{{ route('rankUpDeleteProcess', ['id' => '$__ID']) }}";
                $("#formActionDelete").attr("action", url.replace("%24__ID", id));
                $(".deleteMldalBody").html(
                    `Você realmente deseja deletar? Esta ação é irreversivel`
                );
            };
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
    </x-slot:js>
    
</x-layouts.admin.app>