<x-layouts.main.app title="Blog Detalhes {{ ucfirst($blog->title) }}">
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">{{ $blog->title }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="blog-section blog-single padding-top padding-bottom ">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center pb-2">
                    <div class="col-lg-8 col-12">
                        <article>
                            <div class="post-item-2">
                                <div class="post-inner">
                                    <div class="post-content">
                                        <h2>{{ $blog->title }}</h2>
                                        {{-- <h3>{{ $blog->description }}</h3> --}}
                                        <ul class="lab-ul post-date">
                                            <li>
                                                <span
                                                    class="badge badge-pill badge-{{ $modulesBlog->typeBlogColor($blog->type) }}">
                                                    {{ $modulesBlog->typeBlog($blog->type) }}
                                                </span>
                                            </li>
                                            <li>
                                                <span style="font-weight: bold;">
                                                    <i class="icofont-ui-calendar"></i>
                                                    {{ $date->dateBlog($blog->created_at) }}
                                                </span>
                                            </li>
                                        </ul>
                                        <p>
                                            <?= html_entity_decode($blog->post) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main.app>
