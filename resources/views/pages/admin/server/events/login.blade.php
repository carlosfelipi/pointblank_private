<x-layouts.admin.app title="Evento Login">
  <x-slot:css>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/select2.css') }}">
  </x-slot:css>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-absolute">
          <div class="card-header bg-primary">
            <h5 class="text-white">Adicionar Evento De Login</h5>
          </div>
          <div class="card-body">
            <div class="form theme-form">
              <form class="needs-validation" action="{{ route('loginAddProcess') }}" method="post" id="formVisit"
                novalidate="">
                @csrf
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label class="form-label">Data de inicio</label>
                    <input class="form-control" value="{{ date('Y-m-d') }}" type="date" data-language="pt"
                      name="start_date" required />
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label">Data de
                        encerramento</label>
                      <input class="form-control" type="date" data-language="pt" name="end_date" required />
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-4 mb-3">
                    <label>Escolha O Item</label>
                    <div class="form-group">
                      <select class="js-example-basic-single col-sm-12" name="idOne" id="goodsOne"
                        onChange="selectIdItem()" required>
                        @foreach ($itens as $item)
                        <option value="{{ $item->item_id }}">
                          {{ $item->item_name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Id Do Item</label>
                    <div class="input-group">
                      <input class="form-control" type="number" id="idOne" required disabled required />
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Duração Do Item</label>
                    <div class="input-group">
                      <input class="form-control" placeholder="Ex: 7 Dias" type="number" name="countOne" required />
                    </div>
                  </div>
                </div>
                <div class="col-sm-9 offset-sm-10 mt-3">
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
            <h5 class="text-white">Evento De Login Criados</h5>
          </div>
          <br> <br>
          <div class="table-responsive">
            <table class="table">
              <thead class="bg-primary">
                <tr>
                  <th scope="col"><b>#</b></th>
                  <th scope="col"><b>ITEM</b></th>
                  <th scope="col"><b>DURAÇÃO</b></th>
                  <th scope="col"><b>INÍCIO</b></th>
                  <th scope="col"><b>FIM</b></th>
                  <th scope="col"><b>AÇÕES</b></th>
                </tr>
              </thead>
              <tbody>
                @php
                $posInt = ($logins->currentPage() - 1) * $logins->perPage() + 1;
                @endphp
                @forelse ($logins as $item)
                <tr>
                  <td>{{ $posInt }} </td>
                  <td>{{ $fnItem->itemNameTwo($item->reward_id) }}</td>
                  <td>{{ $fnItem->countDayItem($item->reward_count) }}</td>
                  <td>{{ $fndate->unconvertDateServerTwo($item->start_date) }}</td>
                  <td>{{ $fndate->unconvertDateServerTwo($item->end_date) }}</td>
                  <td>
                    <button type="submit" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                      data-bs-target="#exampleModalCenterDelete" onclick="modalDeleteEventLogin('{{ $item->event_id }}')">
                      <i data-feather="trash"></i>
                    </button>
                  </td>
                </tr>
                @php
                $posInt++;
                @endphp
                @empty
                <tr>
                  <td class="text-center" colspan="100%">Nenhum evento de login encontrado.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $logins->links('components.vendor.pagination.default.bootstrap-4') }}
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
            <h5 class="modal-title deleteModal">Remover De Evento Login</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form method="post" id="formActionDelete">
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
        function selectIdItem() {
            const selectOne = document.getElementById("goodsOne");
            document.getElementById("idOne").value = selectOne.value;
        }
        selectIdItem();
        const modalDeleteEventLogin = (id) => {
            const url = "{{ route('loginDeleteProcess', ['id' => '$__ID']) }}";
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