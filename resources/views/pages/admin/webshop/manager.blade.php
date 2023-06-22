<x-layouts.admin.app title="Itens Webshop">
    <x-slot:css>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/owlcarousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/rating.css') }}">
    </x-slot:css>
    <div class="container-fluid">
        <div class="row project-cards">
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs border-tab">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);" aria-selected="true">
                                        <i data-feather="target"></i>
                                        Itens
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0 me-0"></div>
                            <a class="btn btn-primary" href="{{ route('webShopAdminPage') }}">
                                <i data-feather="plus-square"></i>
                                Adicionar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Todos Itens</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>ItemName</th>
                                        <th>Tag</th>
                                        <th>Categoria</th>
                                        <th>Duração</th>
                                        <th>Preço</th>
                                        <th>Status</th>
                                        <th>Comprado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itens as $item)
                                        <tr>
                                            <td>
                                                <img class="card-news" src="{{ $item->image }}"
                                                    title="{{ $item->item_name }}" alt="{{ $item->item_name }}" />
                                            </td>
                                            <td>
                                                <h6>{{ $item->item_name }}</h6>
                                                <span>{{ $item->item_id }}</span>
                                            </td>
                                            <td>
                                                {{ $modulesItem->tagName($item->tag) }}
                                            </td>
                                            <td>
                                                {{ $modulesItem->slot($item->category) }}
                                            </td>
                                            <td>
                                                {{ $modulesItem->countDayItem($item->count) }}
                                            </td>
                                            <td>
                                                {{ number_format($item->price) }}
                                            </td>
                                            <td>
                                                @if ($item->state == true)
                                                    <span class="badge badge-pill badge-success text-dark">Ativo</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Desativado</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ number_format($item->bought) }}x
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal"
                                                    onclick="modalEdit({
                                                        ItemId: '{{ $item->id }}',
                                                        ItemName: '{{ $item->item_name }}',
                                                        ItemTag: '{{ $item->tag }}',
                                                        ItemCategory: '{{ $item->category }}',
                                                        ItemCount: '{{ $item->count < 86400 ? $item->count : $modulesItem->countDayItemTwo($item->count) }}',
                                                        ItemPrice: '{{ $item->price }}',
                                                        ItemType: '{{ $item->type }}',
                                                        ItemState: '{{ $item->state == true ? '1' : '2' }}'})"
                                                    data-bs-target="#exampleModalCenterEdit"
                                                    class="btn btn-primary btn-xs" data-bs-toggle="modal">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenterDelete"
                                                    onclick="modalDelete('{{ $item->id }}', '{{ $item->item_name }}')">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-modals.admin.delete titleModal="Remover Item" />
        <x-modals.admin.webshop.edit />
    </div>
    <x-slot:js>
        <script>
            const modalDelete = (id, name) => {
                const url = "{{ route('webShopProccessDelete', ['id' => '$__ID']) }}";
                $('#formActionDelete').attr('action', url.replace('%24__ID', id));
                $('.deleteMldalBody').html(
                    `Você realmente deseja deletar este item <b>${name}</b> ? Esta ação é irreversivel`);
            }
            const modalEdit = (item) => {
                const url = "{{ route('webShopProccessUpdate', ['id' => '$__ID']) }}";
                var inputName = $('.itemName')
                var inputCount = $('.itemCount')
                var inputPrice = $('.itemPrice')
                var inputTag = document.getElementById('selectTag')
                var inputType = document.getElementById('selectType')
                var inputSlot = document.getElementById('selectSlot')
                var inputState = document.getElementById('selectState')
                var formAction = $('.modal-edit-center').attr('action', url.replace('%24__ID', item.ItemId))
                inputName.val(item.ItemName)
                inputCount.val(item.ItemCount)
                inputPrice.val(item.ItemPrice)
                inputTag.value = item.ItemTag
                inputSlot.value = item.ItemCategory
                inputType.value = item.ItemType
                inputState.value = item.ItemState
                console.log(item.ItemState);
            }
        </script>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/js/rating/jquery.barrating.js') }}"></script>
        <script src="{{ asset('admin/js/rating/rating-script.js') }}"></script>
        <script src="{{ asset('admin/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('admin/js/ecommerce.js') }}"></script>
        <script src="{{ asset('admin/js/product-list-custom.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
