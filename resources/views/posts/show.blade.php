@extends('layout')
<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">
        @include('partials._header')
    </div>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    {{ $post->title }}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></li>
                    <li class="cat">
                        In&emsp;
                        <a href="#0">{{ $post->cat->name }}</a>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="images/{{ $post->image }}" alt="" width="100%" height="80%">
                </div>
				@php
                $audio_path ="audio/" . $post["audio"];
				if($post->cat->name =='Podcasts'){
					
					echo '<div class="audio-wrap"><audio id="player2" width="100%" height="42" controls="controls" crossOrigin="anonymous">';
					echo "<source src=\"$audio_path\" type='audio/mpeg'>";
					echo "</audio></div>";
				}
                @endphp
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <p class="lead">{{ $post->body }}</p>
                

                <h2>Example big heading</h2>

                <blockquote><p>This is a simple example of a styled blockquote.</p></blockquote>

				<h3>Example smaller Heading</h3>

                <!--<p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        <a href="#0">orci</a>
                        <a href="#0">lectus</a>
                        <a href="#0">varius</a>
                        <a href="#0">turpis</a>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <img src="images/avatars/user-03.jpg" alt="">

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0">{{ $post->user->username }}</a>
                        </h4>
                    
                        <p>Example of an author profile
                        </p>
                        <ul class="s-content__author-social">
                           <li><a href="#0">Facebook</a></li>
                           <li><a href="#0">Twitter</a></li>
                           <li><a href="#0">GooglePlus</a></li>
                           <li><a href="#0">Instagram</a></li>
                        </ul>
                    </div>
                </div>

                <!--<div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <a href="#0" rel="prev">
                                <span>Previous Post</span>
                                Tips on Minimalist Design 
                            </a>
                        </div>
                        <div class="s-content__next">
                            <a href="#0" rel="next">
                                <span>Next Post</span>
                                Less Is More 
                            </a>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->

        <script type="text/javascript">
        var rows="4";        // Sets "Comments" field height
        var email_on="no";   // Disables "E-mail" field
        var sites_on="no";   // Disables "Website" field
</script>
            <div id="hashover"></div>
<script type="text/javascript" src="/hashover/comments.php"></script>
<noscript>You must have JavaScript enabled to see comments.</noscript>



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

</html>