@extends('layout')

<body id="top">

    {{-- Alert component --}}
    <x-alert/>
    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader--home">
        @include('partials._header', ['cats' => $cats])
        <div class="pageheader-content row">
            <div class="col-full">
                <div class="featured">
                    @php $i=0; @endphp
                    @foreach ($publishedPosts as $post)
                    @if($i==0)
                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('{{ $post->image }}');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="?cat={{ $post->cat->id }}">{{ $post->cat->name
                                        }}</a></span>

                                <h1><a href="showpost?slug={{ $post->slug }}" title="{{ $post->title }}">{{ $post->title
                                        }}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">{{ $post->user->username }}</a></li>
                                        <li>
                                            <?php echo date("F j, Y ", strtotime($post["created_at"])) . " "; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->
                    @endif
                    @if($i==1)
                    <div class="featured__column featured__column--small">
                        <div class="entry" style="background-image:url('{{ $post->image }}');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="?cat={{ $post->cat->id }}">{{ $post->cat->name
                                        }}</a></span>

                                <h1><a href="showpost?slug={{ $post->slug }}" title="{{ $post->title }}">{{ $post->title
                                        }}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">{{ $post->user->username }}</a></li>
                                        <li>
                                            <?php echo date("F j, Y ", strtotime($post["created_at"])) . " "; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->
                        @endif
                        @if($i==2)
                        <div class="entry" style="background-image:url('{{ $post->image }}');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="?cat={{ $post->cat->id }}">{{ $post->cat->name
                                        }}</a></span>

                                <h1><a href="showpost?slug={{ $post->slug }}" title="{{ $post->title }}">{{ $post->title
                                        }}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">{{ $post->user->username }}</a></li>
                                        <li>
                                            <?php echo date("F j, Y ", strtotime($post["created_at"])) . " "; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->
                @endif
                @php $i++; @endphp
                @endforeach
            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->

    </section>
    <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
        @if ($cat != 'none')
        <nav class="pgn">
            <h2>Showing results for</h2>
            <ul>
                <li><span class="pgn__num current">{{ $cat->name }}
                        <a href="/" style="text-decoration: none !important; color: inherit;"><i
                                class="fa fa-times-circle fa-lg"></i></a></span></li>
            </ul>
        </nav>
        @endif
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
                @php $i=0; @endphp
                @foreach ($posts as $post)
                <article class="masonry__brick entry format-standard" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="showpost?slug={{ $post->slug }}" class="entry__thumb-link">
                            <img src="{{ $post->image }}" alt="">
                        </a>
                        @if($post->cat->id == '3')
                        <div class="audio-wrap">
                            <audio id="player" src="{{ $post->audio }}" width="100%" height="42"
                                controls="controls"></audio>
                        </div>
                        @endif
                    </div>

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__date">
                                <a href="showpost?slug={{ $post->slug }}">
                                    <?php echo date("F j, Y ", strtotime($post["created_at"])) . " "; ?>
                                </a>
                            </div>
                            <h1 class="entry__title"><a href="showpost?slug={{ $post->slug }}">{{ $post->title }}</a>
                            </h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                @php
                                    echo implode(' ', array_slice(explode(' ', $post['body']), 0, 30)) . "...";
                                @endphp
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="?cat={{ $post->cat->id }}">{{ $post->cat->name }}</a>
                            </span>
                        </div>
                    </div>

                </article> <!-- end article -->
                @if($i % 3 == 0)
                <article class="masonry__brick entry format-quote" data-aos="fade-up">

                    <div class="entry__thumb">
                        <blockquote>
                            @php $r = array_rand($quote->toArray()) @endphp
                            <p>
                                @php
                                echo $quote[$r]->body;
                                @endphp
                            </p>
                            <cite>
                                @php
                                echo $quote[$r]->author;
                                unset($quote[$r]);
                                @endphp
                            </cite>
                        </blockquote>
                    </div>

                </article> <!-- end article -->
                @endif
                @php $i++; @endphp
                @endforeach
                <article class="masonry__brick entry format-link" data-aos="fade-up">

                    <div class="entry__thumb">
                        <div class="link-wrap">
                            <p>Ad space for renting</p>
                            <cite>
                                <a target="_blank" href="/">https://philosophy.com/ads</a>
                            </cite>
                        </div>
                    </div>

                </article>
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        {{-- Paganation --}}
        {{ $posts->links() }}

    </section> <!-- s-content -->



    <!-- s-footer
    ================================================== -->
    @include('partials._footer')


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>

</body>