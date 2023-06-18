<x-layouts.admin.app title="Evento Quest">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-absolute">
          <div class="card-header bg-primary">
            <h5 class="text-white">Adicionar Evento Quest</h5>
          </div>
          <div class="card-body">
            <div class="form theme-form">
              <form class="needs-validation" action="{{ route('questAddProcess') }}" method="post" id="formQuest"
                novalidate="">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Data De Inicio</label>
                    <input class="form-control" value="{{ date('Y-m-d') }}" type="date" data-language="pt"
                      name="start_date" required />
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label" for="validationCustom01">Data De
                        Encerramento</label>
                      <input class="form-control" type="date" data-language="pt" name="end_date" required />
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
            <h5 class="text-white">Evento Quest Criados</h5>
          </div>
          <br> <br>
          <div class="table-responsive">
            <table class="table">
              <thead class="bg-primary">
                <tr>
                  <th scope="col"><b>#</b></th>
                  <th scope="col"><b>INÍCIO</b></th>
                  <th scope="col"><b>FIM</b></th>
                  <th scope="col"><b>AÇÕES</b></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($quests as $item)
                <tr>
                  <td>1 </td>
                  <td>{{ $date->unconvertDateServer($item->start_date) }}</td>
                  <td>{{ $date->unconvertDateServer($item->end_date) }}</td>
                  <td>
                    <button type="submit" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                      data-bs-target="#exampleModalCenterDelete" onclick="modalDelete('{{ $item->event_id }}')">
                      <i data-feather="trash"></i>
                    </button>
                  </td>
                </tr>
                @empty
                <tr>
                  <td class="text-center" colspan="100%">Nenhum evento quest encontrado.</td>
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
            <h5 class="modal-title deleteModal">Remover Evento Quest</h5>
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
      const modalDelete = (id) => {
          const url = "{{ route('questDeleteProcess', ['id' => '$__ID']) }}";
          $('#formActionDelete').attr('action', url.replace('%24__ID', id));
          $('.deleteMldalBody').html(`Você realmente deseja deletar? Esta ação é irreversivel`);
          }
    </script>
    <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
  </x-slot:js>
</x-layouts.admin.app>