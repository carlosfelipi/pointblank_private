<x-layouts.main.app title="Notícias">
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Notícias</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Notícias</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="blog-section padding-top padding-bottom">
        {{-- <section class="text-center p-5 ">
            <div class="btn-group btn-group-sm">
                <a href="/blog" style="font-weight: bold;" class="btn btn-info">TODAS</a>
                <a href="/blog/noticias" style="font-weight: bold;" class="btn btn-danger">NOTÍCIAS</a>
                <a href="/blog/eventos" style="font-weight: bold;" class="btn btn-success">EVENTOS</a>
                <a href="/blog/atualizacoes" style="font-weight: bold;"
                    class="btn btn-warning text-white">ATUALIZAÇÕES</a>
            </div>
        </section> --}}
        <div class="container">
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">
                    @forelse ($news as $item)
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="blog-item">
                                <div class="blog-inner">
                                    <div class="blog-thumb">
                                        <img src="{{ $item->card }}" alt="{{ $item->title }}"
                                            title="{{ $item->title }}" class="w-100">
                                    </div>
                                    <div class="blog-content px-3 py-4">
                                        <a
                                            href="{{ route('blogPageDetail', [
                                                'type' => $modulesBlog->typeBlogUrl($item->type),
                                                'id' => $item->id,
                                                'name' => preg_replace('/[^a-z0-9]/i', '-', strtolower($item->title)),
                                            ]) }}">
                                            <h3>{{ $item->title }}</h3>
                                        </a>
                                        <div class="meta-post">
                                            <a>
                                                <span
                                                    class="badge badge-pill badge-{{ $modulesBlog->typeBlogColor($item->type) }}">
                                                    {{ $modulesBlog->typeBlog($item->type) }}
                                                </span>
                                            </a>
                                            <a>
                                                <span style="font-weight: bold;">
                                                    <i class="icofont-ui-calendar"></i>
                                                    {{ $date->dateBlog($item->created_at) }}
                                                    @if ($item->created_at->format('Y-m-d') != $item->expired_at)
                                                        <a>
                                                            <span class="badge badge-pill badge-light text-dark"
                                                                title="Acontecendo">Acontecendo</span>
                                                        </a>
                                                    @else
                                                        <a>
                                                            <span class="badge badge-pill badge-danger text-dark"
                                                                title="Encerrado">Encerrado</span>
                                                        </a>
                                                    @endif
                                                </span>
                                            </a>
                                        </div>

                                        <a href="{{ route('blogPageDetail', [
                                            'type' => $modulesBlog->typeBlogUrl($item->type),
                                            'id' => $item->id,
                                            'name' => preg_replace('/[^a-z0-9]/i', '-', strtolower($item->title)),
                                        ]) }}"
                                            class="default-button">
                                            <span>
                                                Ver <i class="icofont-circled-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="match-prize text-center">Nenhuma notícia encontrada.</p>
                    @endforelse
                </div>
            </div>
            {{ $news->links('components.vendor.pagination.default.bootstrap-4') }}
        </div>
    </div>
</x-layouts.main.app>
