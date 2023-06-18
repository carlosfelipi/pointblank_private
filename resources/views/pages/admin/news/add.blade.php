<x-layouts.admin.app title="Adicionar Notícia">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Postar Notícia</h5>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <form class="needs-validation" action="{{ route('newsAddProcess') }}" method="post"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Título</label>
                                        <input class="form-control" name="title" id="validationCustom01"
                                            type="text" placeholder="Digite algo..." required>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Subtítulo</label>
                                            <input class="form-control" id="validationCustom02" name="description"
                                                type="text" placeholder="Subtítulo da notícia"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control digits" name="type" id="validationCustom03"
                                                required>
                                                <option value="1">Notícia</option>
                                                <option value="2">Atualização</option>
                                                <option value="3">Evento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data de encerramento</label>
                                            <input class="form-control" type="date" data-language="pt" name="end"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Card</label>
                                                <input class="form-control" type="file" name="card" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Postagem</label>
                                            <textarea id="text-box" class="form-control" type="text" name="post" id="validationCustom05" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-9 offset-sm-10">
                                    <button class="btn btn-primary" type="submit">Postar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <x-slot:js>
        <script src="{{ asset('admin/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('admin/js/editor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/js/editor/ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ asset('admin/js/email-app.js') }}"></script>
        <script src="{{ asset('admin/js/datepicker/date-picker/datepicker.js') }}"></script>
        <script src="{{ asset('admin/js/datepicker/date-picker/datepicker.en.js') }}"></script>
        <script src="{{ asset('admin/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
        <script src="{{ asset('admin/js/dropzone/dropzone.js') }}"></script>
        <script src="{{ asset('admin/js/dropzone/dropzone-script.js') }}"></script>
        <script src="{{ asset('admin/js/typeahead/handlebars.js') }}"></script>
        <script src="{{ asset('admin/js/typeahead/typeahead.bundle.js') }}"></script>
        <script src="{{ asset('admin/js/typeahead/typeahead.custom.js') }}"></script>
        <script src="{{ asset('admin/js/typeahead-search/handlebars.js') }}"></script>
        <script src="{{ asset('admin/js/typeahead-search/typeahead-custom.js') }}"></script>
    </x-slot:js>
</x-layouts.admin.app>
