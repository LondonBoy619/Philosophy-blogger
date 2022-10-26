<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Post Submittion Form">
    <meta name="author" content="LondonBoy">

    <!-- Title Page-->
    <title>Post Submittion Form</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('css/article.css')}}" rel="stylesheet" media="all">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>

    
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w960">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Submit a new post at Philosophy</h2>
                </div>
                <div class="card-body" x-data="{option: 1}">
                    <form enctype="multipart/form-data" name="form_submit" method="post" action="{{Route('createpost')}}">
                        @csrf
						<input type="hidden" name="submitted" value="1">
                        {{-- <div class="form-row">
                            <div class="name">User name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="username" placeholder="Username goes here">
                                <div class="label--desc">*This name would be used as the 'Author Name' in the article</div><br>
                                @error('username')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
							<div class="name">Password</div>
                            <div class="value">
                                <input class="input--style-6" type="password" name="password" placeholder="Password goes here">
                                <div class="label--desc">*Your password is first assigned when your first article is published</div>
                                @error('password')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" name="email" placeholder="example@email.com">
									<div class="label--desc">*Be sure to use your primary email address</div>
                                </div>
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-row">
							<div class="name">Title</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="title" placeholder="Article's title" value="{{old('title')}}">
                                @error('title')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="name">Body</div>
                            <div class="value">
                                <textarea class="input--style-6" name="body" placeholder="Compose an epic article...">{{old('body')}}</textarea><br>
                                @error('body')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
							<div class="name">Category</div>
                            <div class="value">
                                <select class="input--style-6" name="cat" x-model="option">
									<option value="1">Texts</option><option value="3">Podcasts</option><option value="2">Physical Health</option><option value="4">Tech</option>
                                </select>
                                @error('cat')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Audio file</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="audio" accept="audio/*" x-show="option == 3 ? true : false">
                                </div>
                                <div class="label--desc" x-show="option != 3 ? true : false">*Only if category is 'Podcasts'</div><br>
                                @error('audio')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
							<div class="name">Header image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="image" accept="image/*">
                                </div>
                                @error('image')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
						<div class="card-footer">
							<input class="btn btn--radius-2 btn--blue-2" value="Go For It!!" type="submit">
					<div class="label--primary">*You will be contacted by email if your article has been accepted, Hold on to it !</div><br>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>


    <!-- Main JS-->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
</body>

</html>