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
        <div class="container">
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center">
                    @forelse ($news as $item)
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-inner">
                                <div class="blog-thumb">
                                    <a href="{{ route('blogPageDetail', [
                                                'id' => $item->id,
                                            ]) }}">
                                        <img src="{{ $item->card }}" alt="{{ $item->title }}" title="{{ $item->title }}" class="w-100">
                                    </a>
                                </div>
                                <div class="blog-content px-3 py-4">
                                    <a href="{{ route('blogPageDetail', [
                                                'id' => $item->id,
                                            ]) }}">
                                        <h3>{{ $item->title }}</h3>
                                    </a>
                                    <div class="meta-post">
                                        <a>
                                            <span class="badge badge-pill badge-{{ $modulesBlog->typeBlogColor($item->type) }}">
                                                {{ $modulesBlog->typeBlog($item->type) }}
                                            </span>
                                        </a>
                                        <a>
                                            <span style="font-weight: bold;">
                                                <i class="icofont-ui-calendar"></i>
                                                {{ $date->dateBlog($item->created_at) }}
                                                @if ($item->created_at->format('Y-m-d') != $item->expired_at)
                                                <a>
                                                    <span class="badge badge-pill badge-light text-dark" title="Acontecendo">Acontecendo</span>
                                                </a>
                                                @else
                                                <a>
                                                    <span class="badge badge-pill badge-danger text-dark" title="Encerrado">Encerrado</span>
                                                </a>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <a href="{{ route('blogPageDetail', [
                                            'id' => $item->id,
                                        ]) }}" class="default-button">
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