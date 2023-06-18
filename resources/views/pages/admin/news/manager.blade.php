<x-layouts.admin.app title="Notícias">
    <x-slot:css>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/owlcarousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/rating.css') }}">
        <style>
            .card-news {
                max-width: 64px;
                max-height: 64px;
                /* width: 64px;
                height: 64px; */
            }
        </style>
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
                                        Todas
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0 me-0"></div>
                            <a class="btn btn-primary" href="{{ route('newsAddAdminPage') }}">
                                <i data-feather="plus-square"></i>
                                Adicionar Uma Nova
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Todas Notícias</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Card</th>
                                        <th>Detalhes</th>
                                        <th>Categoria</th>
                                        <th>Status</th>
                                        <th>Início // Fim</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>
                                                <img class="card-news" src="{{ $item->card }}"
                                                    title="{{ $item->title }}" alt="{{ $item->title }}" />
                                            </td>
                                            <td>
                                                <h6>{{ $item->title }}</h6>
                                                <span>{{ $item->description }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-pill badge-{{ $modulesBlog->typeBlogColor($item->type) }}">
                                                    {{ $modulesBlog->typeBlog($item->type) }}
                                                </span>
                                            </td>
                                            @if ($item->created_at->format('Y-m-d') != $item->expired_at)
                                                <td class="font-success">Acontecendo</td>
                                            @else
                                                <td class="font-danger">Encerrado</td>
                                            @endif
                                            <td>{{ $item->created_at->format('d-m') }} //
                                                {{ date('d-m', strtotime($item->expired_at)) }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>
                                                <a href="{{ route('newsEditAdmin', ['id' => $item->id]) }}">
                                                    <button class="btn btn-primary btn-xs" type="button">
                                                        <i data-feather="edit"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenterDelete"
                                                    onclick="modalDelete('{{ $item->id }}', '{{ $item->title }}')">
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
    </div>
    {{-- Modal Delete Start --}}
    <div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title deleteModal">Remover Notícia</h5>
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
    <x-slot:js>
        <script>
            const modalDelete = (id, name) => {
                const url = "{{ route('newsDeleteProcess', ['id' => '$__ID']) }}";
                $('#formActionDelete').attr('action', url.replace('%24__ID', id));
                $('.deleteMldalBody').html(
                    `Você realmente deseja deletar esta notícia <b>${name}</b> ? Esta ação é irreversivel`);
            }
        </script>
        <script src="{{ asset('admin/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/js/rating/jquery.barrating.js') }}"></script>
        <script src="{{ asset('admin/js/rating/rating-script.js') }}"></script>
        <script src="{{ asset('admin/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('admin/js/ecommerce.js') }}"></script>
        <script src="{{ asset('admin/js/product-list-custom.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
