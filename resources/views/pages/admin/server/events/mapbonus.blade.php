<x-layouts.admin.app title="Evento De Mapas">
  <x-slot:css>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/date-picker.css')}}">
  </x-slot:css>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-absolute">
          <div class="card-header bg-primary">
            <h5 class="text-white">Adicionar Evento De Mapas</h5>
          </div>
          <div class="card-body">
            <div class="form theme-form">
              <form class="needs-validation" action="{{ route('mapBonusAddProcess') }}" method="post" id="formMapbonus"
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
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Escolha um Mapa</label>
                    <select class="form-control" id="mapSelect" name="map_id" onchange="updateInputs()" required>
                      <option value="">Selecione um mapa</option>
                      @foreach ($fnMap->mapId() as $id => $name)
                      <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col">
                    <div class="form-group" id="modeSelectContainer" style="display: none;">
                      <label class="form-label" for="validationCustom01" id="modeSelectLabel">
                        Escolha o Modo desse Mapa
                      </label>
                      <select class="form-control" id="modeSelect" name="map_stage" required>
                        @foreach ($fnMap->mapStage() as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Porcentagem De Gold</label>
                    <input class="form-control" type="number" placeholder="Ex:5000%" name="percent_gp"
                      id="percent_gp_input" required />
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-label" for="validationCustom01">Porcentagem De
                        Exp</label>
                      <input class="form-control" placeholder="Ex:5000%" type="number" name="percent_xp"
                        id="percent_xp_input" required />
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
            <h5 class="text-white">Evento De Mapas Criados</h5>
          </div>
          <br> <br>
          <div class="table-responsive">
            <table class="table">
              <thead class="bg-primary">
                <tr>
                  <th scope="col"><b>#</b></th>
                  <th scope="col"><b>MAPA</b></th>
                  <th scope="col"><b>MODO</b></th>
                  <th scope="col"><b>PORCETAGEM EXP</b></th>
                  <th scope="col"><b>PORCETAGEM GOLD</b></th>
                  <th scope="col"><b>INÍCIO</b></th>
                  <th scope="col"><b>FIM</b></th>
                  <th scope="col"><b>AÇÕES</b></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($maps as $item)
                <tr>
                  <td>1 </td>
                  <td>
                    @php
                    if (array_key_exists($item->map_id, $fnMap->mapId())) {
                    $mapName = $fnMap->mapId()[$item->map_id];
                    echo $mapName;
                    } else {
                    echo "Mapa não encontrado";
                    }
                    @endphp
                  </td>
                  <td>
                    @php
                    if (array_key_exists($item->stage_type, $fnMap->mapStage())) {
                    $mapStage = $fnMap->mapStage()[$item->stage_type];
                    echo $mapStage;
                    } else {
                    echo "Modo não encontrado";
                    }
                    @endphp
                  </td>
                  <td>{{ number_format($item->percent_xp) }}%</td>
                  <td>{{ number_format($item->percent_gp) }}%</td>
                  <td>{{ $fnDate->unconvertDateServer($item->start_date) }}</td>
                  <td>{{ $fnDate->unconvertDateServer($item->end_date) }}</td>
                  <td>
                    <button type="submit" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                      data-bs-target="#exampleModalCenterDelete" onclick="modalDelete('{{ $item->event_id }}')">
                      <i data-feather="trash"></i>
                    </button>
                  </td>
                </tr>
                @empty
                <tr>
                  <td class="text-center" colspan="100%">Nenhum evento xmas encontrado.</td>
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
            <h5 class="modal-title deleteModal">Remover Evento De Mapa</h5>
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
      const formatNumberWithDot = (number) =>
          number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      const removeDotFromNumber = (number) => number.replace(/\./g, "");
  
      document
          .getElementById("percent_xp_input")
          .addEventListener("input", (event) => {
              const value = event.target.value.replace(/\./g, "");
              event.target.value = formatNumberWithDot(value);
          });
  
      document
          .getElementById("percent_gp_input")
          .addEventListener("input", (event) => {
              const value = event.target.value.replace(/\./g, "");
              event.target.value = formatNumberWithDot(value);
          });
  
      document
          .getElementById("formMapbonus")
          .addEventListener("submit", (event) => {
              const percentXpInput =
                  document.getElementById("percent_xp_input");
              const percentGpInput =
                  document.getElementById("percent_gp_input");
  
              percentXpInput.value = removeDotFromNumber(
                  percentXpInput.value
              );
              percentGpInput.value = removeDotFromNumber(
                  percentGpInput.value
              );
          });
    </script>

    <script>
      const updateInputs = () => {
            const mapSelect = document.getElementById("mapSelect");
            const modeSelectLabel = document.getElementById("modeSelectLabel");
            const modeSelectContainer = document.getElementById(
                "modeSelectContainer"
            );

            if (mapSelect.value !== "") {
                modeSelectLabel.innerHTML = `Escolha o Modo do Mapa ${
                    mapSelect.options[mapSelect.selectedIndex].text
                }`;
                modeSelectContainer.style.display = "block";
            } else {
                modeSelectLabel.innerHTML = "Escolha o Modo desse Mapa";
                modeSelectContainer.style.display = "none";
            }
        };

        const modalDelete = (id) => {
            const url = "{{ route('mapBonusDeleteProcess', ['id' => '$__ID']) }}";
            $("#formActionDelete").attr("action", url.replace("%24__ID", id));
            $(".deleteMldalBody").html(
                "Você realmente deseja deletar? Esta ação é irreversível"
            );
        };
    </script>
    <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
  </x-slot:js>

</x-layouts.admin.app>